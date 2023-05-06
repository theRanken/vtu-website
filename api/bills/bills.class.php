<?php
require_once dirname(__DIR__) . "/api.class.php";

class UtilityBill extends BaseApiClient
{
    public function get_meter_details(string $billersCode, string $serviceID, string $meterType)
    {
        $url = $this->api . "merchant-verify";
        $config = [
            'headers' => [
                "Authorization" => "Basic " . base64_encode($this->auth->username . ':' . $this->auth->password)
            ],
            'form_params' => [
                'billersCode' => $billersCode,
                'serviceID' => $serviceID,
                'type' => $meterType
            ]
        ];
        $details = $this->client->request('POST', $url, $config);

        $body = (string)$details->getBody();
        $response = json_encode($body, true);

        if($response['code'] != "000") 
            return json_encode("We're sorry Something went terribly wrong!");

        $content = $response['content'];
        return json_encode($content ?? "No biller with ". $billersCode ."was found!");
    }

    public function pay_bill($user, $serviceID, $billersCode, $variationCode, $amount, $phone)
    {
        $url = $this->api . "pay";
        $config = [
            'headers' => [
                "Authorization" => "Basic " . base64_encode($this->auth->username . ':' . $this->auth->password)
            ],
            'form_params' => [
                'billersCode' => $billersCode,
                'serviceID' => $serviceID,
                'variation_code' => $variationCode,
                'amount' => $amount,
                'phone' => $phone
            ]
        ];

        $pay = $this->client->request('POST', $url, $config);

        $body = (string) $pay->getBody();
        $response = json_encode($body, true);

        if($response['code'] != "000") 
            return json_encode("We're sorry Something went terribly wrong!");

        $transaction = $response['content'];
        $date = $transaction['created_at'];
        $name = $transaction['name'];
        $phoneNo = $transaction['phone'];
        $amount = $transaction['amount'];
        $token = $response['mainToken'];
        $tax = $response['mainTokenTax'];
        $units = $response['mainTokenUnits'];
        $tokenAmount = $response['mainsTokenAmount'];
        $transactionID = $response['requestID'];
        $product = $transaction['product_name'];
        $transactionStatus = $transaction['status'];

        if (!BaseApiClient::check_balance($amount, $user)) {
            return json_encode("Transaction failed due to insufficient balance, topup your wallet and try again");
        }
        $add_utility_bill_transaction =   "INSERT INTO utility_bills (user, name, phone , product ,token, tax, units, token_amount, transaction_id ,  price , created_at,  status ) 
        VALUES ('$user', '$name', '$phoneNo', '$product','$token', $tax, '$units', '$tokenAmount', '$transactionID', '$amount', '$date', '$transactionStatus' )";

        $bill_transaction = $this->con->query($add_utility_bill_transaction);

        if(!$bill_transaction){
          return json_encode("Failed to add transaction record for utility bill with ID: " . $transactionID);  
        }

        debit($amount, $user);
        // Retrieve the record
        $get_cable_transaction = $this->con->query("SELECT * from utility_bills WHERE transid='$transactionID' ");
        $processed_transaction = $get_cable_transaction->fetch_assoc();
        return json_encode($processed_transaction);
    }
}


$utility = new UtilityBill($con, [
    'debug' => true,
    'live_url' => " https://vtpass.com/api/",
    'sandbox_url' => "https://sandbox.vtpass.com/api/"
]);