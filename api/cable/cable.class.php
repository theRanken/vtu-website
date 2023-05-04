<?php
require_once dirname(dirname(__DIR__)) . "/core/conn.php";
require dirname(dirname(__DIR__)) . "/guzzle/vendor/autoload.php";
require dirname(__DIR__) . "/helpers.php";
use GuzzleHttp\Client;

class CableTv
{
    private $client;
    private $api;
    private $auth;
    public function __construct(private mysqli $con, array $options)
    {

        $sql = $this->con->query("SELECT * FROM simhosting");
        $settings = $sql->fetch_object();

        $this->auth = (object) [
            "username" => trim($settings->vt_username),
            "password" => trim($settings->vt_password)
        ];


        $this->client = new Client([
            'verify' => false,
            'allow_redirects' => false
        ]);

        // Determin whether to use 
        if ($options['debug'] === false) {
            $this->api = "https://vtpass.com/api/";
        } else {
            $this->api = "https://sandbox.vtpass.com/api/";
        }
    }

    public function plans(mixed $serviceID)
    {
        $url = $this->api . "service-variations?serviceID=" . $serviceID;
        $iuc = $this->client->request('GET', $url, [
            'auth' => [
                $this->auth->username,
                $this->auth->password
            ]
        ]);

        $response = (string) $iuc->getBody();
        $body = json_decode($response, true);
        $plans = $body['content']['varations'];

        return json_encode($plans ?? ["message" => "No plans found for this service"]);
    }

    public function validate_iuc($iucNumber, $biller)
    {
        $url = $this->api . "merchant-verify";
        $authorization = "Basic " . base64_encode($this->auth->username . ':' . $this->auth->password);
        $iuc = $this->client->request('POST', $url, [
            'headers' => [
                "Authorization" => $authorization
            ],
            'form_params' => [
                'billersCode' => $iucNumber,
                'serviceID' => $biller,
            ]
        ]);



        switch ($iuc->getStatusCode()) {
            case 030:
                $message = json_encode([
                    "message" => "Unable to reach the biller!"
                ]);
                return $message;

            case 011:
                $message = json_encode([
                    "message" => "You are not passing atleast one of the arguments"
                ]);
                return $message;
            case 012:
                $message = json_encode([
                    "message" => "Product does not exist!"
                ]);
                return $message;

            default:
                $response = (string) $iuc->getBody();
                $body = json_decode($response, true);
                $iuc_details = $body['content'];
                return json_encode($iuc_details ?? "Unable to verify smart card/iuc number!");
        }

    }


    public function purchase(
        string $user,
        string $recipient,
        string $serviceID,
        string|int $iucNumber,
        string $variationCode,
        string|int $phone,
        string|int $serviceCharge
    ) {
        $config = [
            'headers' => [
                "Authorization" => "Basic " . base64_encode($this->auth->username . ':' . $this->auth->password)
            ],
            'form_params' => [
                'request_id' => self::request_id(),
                'billersCode' => $iucNumber,
                'serviceID' => $serviceID,
                'variation_code' => $variationCode,
                'phone' => $phone,
                'subscription_type' => 'change',
            ]
        ];

        $url = $this->api . "pay";
        $purchase = $this->client->request('POST', $url, $config);

        if ($purchase->getstatusCode() !== 200)
            throw new Exception($purchase->getReasonPhrase());

        date_default_timezone_set("Africa/Lagos");

        // Parse the response body to get useful information
        $response = (string) $purchase->getBody();
        $body = json_decode($response, true);
        $content = $body['content'];
        $transaction = $content['transactions'];
        $date = $body['transaction_date']['date'] ?? date('d/m/Y h:m');

        $phone_no = $transaction['phone'];
        $transactionID = $transaction['transactionId'];
        $transactionStatus = $transaction['status'];
        $amount = $transaction['amount'] + ($serviceCharge ?? 0.0);

        // Check if balance is enough for a successful transaction 
        if (!self::check_balance($amount, $user)) {
            return json_encode("Transaction failed due to insufficient balance, topup your wallet and try again");
        }

        $add_cable_transaction_query =   "INSERT INTO cable (username, name, number , plans ,  transid ,  price , date ,  status ) 
        VALUES ('$user', '$recipient', '$phone_no', '$variationCode', '$transactionID', '$amount', '$date', '$transactionStatus' )";

        $cable_transaction = $this->con->query($add_cable_transaction_query);
        if(!$cable_transaction){
          return json_encode("Failed to add transaction record for: " . $transactionID);  
        }

        debit($amount, $user);
        // Retrieve the record
        $get_cable_transaction = $this->con->query("SELECT * from cable WHERE transid='$transactionID' ");
        $processed_transaction = $get_cable_transaction->fetch_assoc();
        return json_encode($processed_transaction);        
    }

    public static function check_balance($amount, $username){
        $is_sufficient = is_balance_sufficient($amount, $username);
        return $is_sufficient;
    }

    public static function request_id()
    {
        $randString = strtoupper(substr(uniqid(), 0, 8));
        date_default_timezone_set("Africa/Lagos");
        $date = date('Ymdhm');
        $id = $date . $randString;

        return $id;
    }
}

$cable = new CableTv($con, [
    'debug' => true
]);