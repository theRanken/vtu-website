<?php
require_once dirname(__DIR__) . "/api.class.php";

class UtilityBill extends BaseApiClient
{
    public function get_meter_details(string $billersCode, string $serviceID, string $meterType)
    {
        $url = $this->api . "merchant-verify";
        $config = [
            'headers' => ["Authorization" => $this->getBasicAuthHeaderValue()],
            'form_params' => [
                'billersCode' => $billersCode,
                'serviceID' => $serviceID,
                'type' => $meterType
            ]
        ];
        $details = $this->client->request('POST', $url, $config);

        $body = (string)$details->getBody();
        $response = json_decode($body, true);

        if($response['code'] != "000" || $details->getStatusCode() != 200) 
            throw new Exception("We're sorry Something went terribly wrong!");

        $content = $response['content'];

        if(isset($content['WrongBillersCode']))
            if($content['WrongBillersCode'] === true) 
                throw new Exception("We're sorry that meter number you entered is wrong!");

        return json_encode($content ?? "No biller with ". $billersCode ."was found!");
    }

    public function pay_bill($user, $serviceID, $billersCode, $variationCode, $amount, $phone)
    {
        $url = $this->api . "pay";
        $config = [
            'headers' => ["Authorization" => $this->getBasicAuthHeaderValue()],
            'form_params' => [
                'request_id' => BaseApiClient::request_id(),
                'billersCode' => $billersCode,
                'serviceID' => $serviceID,
                'variation_code' => $variationCode,
                'amount' => $amount,
                'phone' => $phone
            ]
        ];

        $pay = $this->client->request('POST', $url, $config);

        $body = (string) $pay->getBody();
        $response = json_decode($body, true);

        if($response['code'] != "000")
            throw new Exception("Something Went Wrong!");

        $transaction = $response['content']['transactions'];
        $date = $response['transaction_date']['date'];
        $name = $response['customerName'] ?? "unnamed";
        $phoneNo = $transaction['phone'];
        $amount = $response['amount'] ?? $transaction['total_amount'];
        $token = $response['token'] ?? $response['mainToken'] ?? $response['Token'];
        $tax = $response['vat'] ?? $response['Vat'] ?? $response['taxAmount'] ?? $response['mainTokenTax'] ?? "[Empty]";
        $units = $response['units'] ?? $response['mainTokenUnits'] ?? $response['PurchasedUnits'];
        $tokenAmount = $response['amount'];
        $transactionID = $response['requestId'];
        $product = $transaction['product_name'];
        $transactionStatus = $transaction['status'];

        if (!BaseApiClient::check_balance($amount, $user))
            throw new Exception("Transaction failed due to insufficient balance, topup your wallet and try again");

        $add_utility_bill_transaction =   "INSERT INTO utility_bills (user, name, phone , product ,token, tax, units, token_amount, amount, transaction_id ,created_at,  status ) 
        VALUES ('$user', '$name', '$phoneNo', '$product','$token', $tax, '$units', '$tokenAmount', '$amount', '$transactionID',  '$date', '$transactionStatus' )";

        $bill_transaction = $this->con->query($add_utility_bill_transaction);

        if(!$bill_transaction)
          throw new Exception("Failed to add transaction record for utility bill with ID: " . $transactionID);

        debit($amount, $user);
        // Retrieve the record
        $get_cable_transaction = $this->con->query("SELECT * from utility_bills WHERE transaction_id='$transactionID' ");
        $processed_transaction = $get_cable_transaction->fetch_assoc();
        return json_encode($processed_transaction);
    }
}


$utility = new UtilityBill($con, [
    'debug' => true,
    'live_url' => " https://vtpass.com/api/",
    'sandbox_url' => "https://sandbox.vtpass.com/api/"
]);