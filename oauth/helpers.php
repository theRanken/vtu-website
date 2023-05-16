<?php
require_once dirname(__DIR__) . "/core/conn.php";




function redirect(string $uri){
    $redirect_url = "Location:".$uri;
    header($redirect_url);
    exit;
}

function generate_random_string(int $length):string
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $string = substr(str_shuffle($chars), 0, $length);
    return $string;
}

function generate_token():string
{
    $token = uniqid(generate_random_string(16)).generate_random_string(32);
    return $token;
}


function user_exists(string $email):bool
{
    global $con;
    // get a connection and query for supplied email
    $sql = $con->query("SELECT * FROM  user WHERE email='$email'");
    // check if the supplied email exists
    $isExisting = ($sql->num_rows <= 0) ? false : true;
    // return the existing status
    return $isExisting;
}

function get_user(string $email):object
{
    global $con;
    $sql = $con->query("SELECT * FROM  user WHERE email='$email'");
    // check if user exists and get user object
    // or return an empty object
    $user = user_exists($email) ? $sql->fetch_object() : (object)[];
    // return user object
    return $user;
}

function get_status(string $email){
    global $con;
    $ip = $_SERVER['REMOTE_ADDR'];

    $query1 = "SELECT * FROM user WHERE email='$email' AND status=1 ";
    $result1 = $con->query($query1);

    $query2 = "SELECT * FROM user WHERE email='$email'   AND status=0 ";
    $result2 = $con->query($query2);

    $query3 = "SELECT * FROM user WHERE email='$email'   AND status=2 ";
    $result3 = $con->query($query3);

    if ($result1->num_rows == 1) {
       $con->query("UPDATE user SET ip='$ip' WHERE email='$email'");
        return 1;
    }
    else if($result2->num_rows == 1) return 0;
    else if($result3->num_rows == 1) return 2;


}

?>