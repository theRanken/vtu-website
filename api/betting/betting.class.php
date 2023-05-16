<?php
require_once dirname(__DIR__) . "/../core/conn.php";
require dirname(__DIR__) . "/../guzzle/vendor/autoload.php";
require dirname(__DIR__) . "/helpers.php";
use GuzzleHttp\Client;

class Betting
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

        // Determine whether to use 
        if ($options['debug'] === false) {
            $this->api = "https://messaging.vtpass.com/v2/api/sms/";
        } else {
            $this->api = "https://messaging.vtpass.com/v2/api/sms/";
        }
    }
}