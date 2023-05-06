<?php
require_once dirname(__DIR__) . "/../core/conn.php";
require dirname(__DIR__) . "/../guzzle/vendor/autoload.php";
require dirname(__DIR__) . "/helpers.php";
use GuzzleHttp\Client;
class BulkSMS
{
    
    private $client;
    private $api;
    private $auth;
    public function __construct(
        private mysqli $con,
        array $options
    ){
        $sql = $this->con->query("SELECT * FROM simhosting");
        $settings = $sql->fetch_object();

        $this->auth = (object) [
            "public" => trim($settings->vt_public_key),
            "secret" => trim($settings->vt_secret_key)
        ];


        $this->client = new Client([
            'verify' => false,
            'allow_redirects' => false
        ]);

        // Determin whether to use 
        if ($options['debug'] === false) {
            $this->api = "https://messaging.vtpass.com/v2/api/sms/";
        } else {
            $this->api = "https://messaging.vtpass.com/v2/api/sms/";
        }
    }

    public function send_messages(string $sender, string $recipient, string $message, bool $dndMode)
    {
        $dndUrl = $this->api . "dnd-route";
        $normalUrl = $this->api . "sendsms";

        // checks if DND mode is turned on
        $finalUrl = $dndMode ? $dndUrl : $normalUrl;

        // send request
        $request = $this->client->request('GET', $finalUrl, [
            'headers' => [
                "X-Token" => $this->auth->public,
                "X-Secret" => $this->auth->secret
            ],
            'query' => [
                'sender' => $sender,
                'recipient' => $recipient,
                'message' => $message,
                'responsetype' => 'json'
            ]
        ]);

        $response = (string) $request->getBody();
        $body = json_encode($response, true);
        $date = $body['sentDate'];
        $messages = $body['messages'];
        $state = (object) $messages;

        if(strtolower($state->status) != "sent"){
            return json_encode("Something went wrong whilst trying to deliver messages");
        }

        return json_encode($messages);
    }
}