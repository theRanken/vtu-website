<?php
require_once dirname(__DIR__)."/google-api/vendor/autoload.php";
require __DIR__."/helpers.php";
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

$client = new Client(['verify'=>false]);

class FB{
    private $config;
    private $client;
    
    public function __construct(ClientInterface $client){
        $getConfig = require("config.php");
        $this->config = $getConfig['Facebook'];
        $this->client = $client;
    } 

    public function createAuthURL(){
        $FBAuthURL = "https://www.facebook.com/v16.0/dialog/oauth?".
            "client_id=". $this->config['id'].
            "&redirect_uri=".$this->config['callback'].
            "&state=".generate_token();

        return $FBAuthURL;
    }

    public function fetchAccessTokenCode(string $code){
        $url = "https://graph.facebook.com/v16.0/oauth/access_token?".
                "client_id=". $this->config['id'].
                "&redirect_uri=".$this->config['callback'].
                "&client_secret=".$this->config['secret'].
                "&code=".$code;

        $response = $this->client->request('GET', $url);

        if(!($response->getStatusCode() === 200)){
            throw new Exception("The request could not complete");
        }

        $data = $response->getBody();

        $token = $data['access_token'];

        return $token;
    }

    public function getUser(){

    }

}

$FBClient = new FB($client);

$FBClientAuthURL = $FBClient->createAuthURL();