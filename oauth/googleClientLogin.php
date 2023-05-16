<?php
require_once dirname(__DIR__)."/google-api/vendor/autoload.php";
use GuzzleHttp\Client;


// Get Configuration for Google Login
$config = require("config.php");


// Get credentials for google login
$credentials = $config["Google"];
// Set Callback url
$url = $credentials["callback"];

// Instantiate the Google Client along with parameters
$client = new Google_Client();
$client->setClientId($credentials["id"]);
$client->setClientSecret($credentials["secret"]);
$client->setApplicationName("ConnectValueDataService");
$client->setRedirectUri($url);
$client->addScope([
    "https://www.googleapis.com/auth/userinfo.profile",
    "https://www.googleapis.com/auth/userinfo.email",
]);
$client->authorize();


session_start();
//Create the login URL for the button to link to
$googleAuthUrl = $client->createAuthUrl();

