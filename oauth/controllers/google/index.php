<?php
require_once "../../googleClientLogin.php";
require_once "../../../core/conn.php";
require_once "../../helpers.php";
use Google\Service\Oauth2;

$code = $_GET['code'] ?? false;

if(isset($code)){
    $token = $client->fetchAccessTokenWithAuthCode($code);
}else{
    $_SESSION['GoogleError'] = "We're Sorry Something Went Wrong!";
    return redirect("/login");
}

if(isset($token['error']) != "invalid_grant"){
    $oauth = new Oauth2($client);
    $user = $oauth->userinfo_v2_me->get();

    // get googlge user email
    $user_email = $user['email'];

    // if user doesn't exist create an account for the user
    if(user_exists($user_email) === false){ 
        $email = $user_email;
        $name = $user["givenName"]." ".$user["familyName"];
        $username = strtolower($user["givenName"].substr($user["familyName"], 0, 3));
        $apiKey = generate_token();
        $ip = $_SERVER["REMOTE_ADDR"];
        $current = new DateTime('now');
        $current_date = date_format($current,"d/m/Y H:i:s");

        $sql = $con->query("
            INSERT INTO user (name, email, username, password, phone, apiKey, status, bal, ref, refBal, ip, kyc, type, date)
            VALUES ('$name', '$email', '$username', 01234567890, 'empty', '$apiKey', 1, 0.0, '', 0.0,  '$ip', 0, 'SMART', '$current_date');
        ");

        if($sql === FALSE){
            $_SESSION['GoogleError'] = "We're Sorry Something Went Wrong with your login request!";
            return redirect("/login");
        }
        
    }

    // get logged in user variables;
    $loggedInUser = get_user($user_email); 
    
    // store necessary session data
    $_SESSION['id'] = $loggedInUser->id;
    $_SESSION['password'] = $loggedInUser->password;
    $_SESSION['name'] = $loggedInUser->name;
    
    // redirect to dashboard
    echo "<script>location.href='/dashboard'</script>";
}else{
    $_SESSION['GoogleError'] = "We're sorry that's an Invalid Login, please try again!";
    return redirect("/login");
}