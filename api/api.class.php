<?php

require_once dirname(__DIR__) . "/core/conn.php";
require dirname(__DIR__) . "/guzzle/vendor/autoload.php";
require __DIR__ . "/helpers.php";
use GuzzleHttp\Client;

class BaseApiClient
{
    protected $client;

    protected $api;

    protected $auth;

    protected $settings;

    public function __construct(
        protected mysqli $con,
        array $options
    ){
        $sql = $this->con->query("SELECT * FROM simhosting");
        $this->settings = $sql->fetch_object();

        $this->client = new Client([
            'verify' => false,
            'allow_redirects' => false
        ]);

        $this->setAuthType($options);

        $this->setDefaultUrl($options);

        
    }

    private function setAuthType(array $options)
    {
        if($options['auth_type']== 'api'){
             $this->auth = (object) [
                "public" => trim($this->settings->vt_public_key),
                "secret" => trim($this->settings->vt_secret_key)
            ]; 
        }else{
            $this->auth = (object) [
                "username" => trim($this->settings->vt_username),
                "password" => trim($this->settings->vt_password)
            ];
        }
    }

    private function setDefaultUrl(array $options)
    {
        if (!$options['live_url']){  
            throw new Exception(
            "The 'live_url' option must be set in options array!\n 
            because this acts as the fallback url when no sandbox url is found"
            );
        }

        /**  
        * This crazy one-liner assigns api url
        * based on the "debug" option setting
        * if the sandbox_url isn't found it defaults to 
        * the live_url setting if "debug === true"   
        */
        $this->api = ($options['debug'] === false) ? 
                        $options['live_url'] : $options['sandbox_url'] ?? $options['live_url'];
    }

    protected function getBasicAuthHeaderValue(){
        return "Basic " . base64_encode($this->auth->username . ':' . $this->auth->password);
    }

    public static function check_balance(string|int|float $amount, string $username):bool
    {
        $is_sufficient = is_balance_sufficient($amount, $username);
        return $is_sufficient;
    }

    public static function request_id():string
    {
        $randString = strtoupper(substr(uniqid(), 0, 8));
        date_default_timezone_set("Africa/Lagos");
        $date = date('Ymdhm');
        $id = $date . $randString;

        return $id;
    }
}