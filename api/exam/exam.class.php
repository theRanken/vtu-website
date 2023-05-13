<?php
require_once dirname(__DIR__) . "/api.class.php";

class Exam extends BaseApiClient
{
    /**
     * Check if the exam service is available;
     *
     * @param string $serviceID
     * @return boolean
     */
    public function check_service(string $serviceID):bool
    {
        $get_service_status = $this->con->query("SELECT * from exam_lock");
        $status = $get_service_status->fetch_assoc();
        if($status[$serviceID] == "off"){
            return false;
        }
        return true;
    }

    public function check_included_price(string $serviceID):string|float
    {
        $get_price = $this->con->query(" SELECT * from scratch_card_prices ");
        $prices = $get_price->fetch_assoc();
        $waec_included_price = (float) $prices['waec_card'];
        $neco_included_price = (float) $prices['neco_token'];
        $nabteb_included_price = (float) $prices['nabteb_token'];

        switch($serviceID){
            case "neco":
                return $neco_included_price;
            case "nabteb":
                return $nabteb_included_price;
            default:
                return $waec_included_price;
        }

    }
    /**
     * returns a list of exam types 
     *
     * @param string $serviceID
     * @return string|boolean
     */
    public function get_types(string $serviceID):string|bool
    {
        if(!$this->check_service($serviceID))
            throw new Exception("This service is unavailable!");

        $platform_price = $this->check_included_price($serviceID);

        $url = $this->api . "service-variations";
        $config = [
            'query' => [
                'serviceID' => $serviceID 
            ]
        ];
        $request = $this->client->request('GET', $url, $config);

        $response = (string) $request->getBody();
        $body = json_decode($response,true);

       
        if($body["response_description"] != "000")
            return  json_encode("We're sorry something went wrong!");

        $content = $body["content"];
        $variations = $content["varations"][0];
        $variations["variation_amount"] = (float) $variations["variation_amount"] + $platform_price;

        

        return json_encode($variations);

    }

    /**
     * Returns Payment data with receipt
     *
     * @param string $user
     * @param string $service
     * @param string $variation
     * @param string $phone
     * @return string|boolean
     */
    public function buy_scratch_card($user, string $exam, string|int $quantity, string|float $amount)
    {
        $get_code = json_decode((string) $this->get_types($exam));
        $platform_price = $this->check_included_price($exam);

        // if quantity bought is more than 5
        if(intval($quantity) > 5)
            throw new Exception("You cannot purchase more than 5 scratch cards at a time!");

        // send request to purchase scratch card
        $url = $this->api . "pay";
        $config = [
            'headers' => [
                "Authorization" => $this->getBasicAuthHeaderValue()
            ],
            'form_params' => [
                'request_id' => BaseApiClient::request_id(),
                'serviceID' => $exam, 
                'variation_code' => $get_code->variation_code,
                'quantity' => $quantity, 
                'phone' => "+23481000000"
            ]
        ];
        $request = $this->client->request('POST', $url, $config);

        $response = (string) $request->getBody();
        $body = json_decode($response,true);

        if($body["code"] != "000")
            throw new Exception("We're Sorry something went wrong!\n we'll fix this soon enough!");

        $content = $body["content"];
        $transaction = $content["transactions"];
        $transaction_id = $transaction["transactionId"];
        $status = $transaction['status'];
        $amount_paid = (float) $transaction['unit_price'] + $platform_price;
        $cards = $body['cards'];

        if (!BaseApiClient::check_balance($amount_paid, $user))
            throw new Exception("Transaction failed due to insufficient balance, topup your wallet and try again");

        $base_query = "INSERT INTO resultchecker (transaction_id, username, amount, oldbal, newbal, exam, serial_no, pin, status)  VALUES ";
        foreach($cards as &$card){
            $old_balance = get_account_balance($user);
            $new_balance = $old_balance - $amount_paid;
            $serial = $card["Serial"];
            $pin = $card["Pin"];

            debit($amount_paid, $user);

            $base_query .= "('$transaction_id', '$user', '$amount_paid', '$old_balance','$new_balance', '$exam', '$serial', '$pin', '$status' ),";
        }

        $base_query = rtrim($base_query, ",");

        $exam_transaction = $this->con->multi_query($base_query);

        if(!$exam_transaction)
            throw new Exception("Failed to add transaction(s) record for exam scratch card(s)");

        return json_encode($content);
    }
   
}


$exam = new Exam($con, [
    'debug' => true,
    'live_url' => "https://vtpass.com/api/",
    'sandbox_url' => "https://sandbox.vtpass.com/api/",
]);