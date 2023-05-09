<?php
require_once dirname(__DIR__) . '/core/conn.php';
require_once dirname(__DIR__) . '/core/template-engine/Template.php';

// request method helpers
function request_method():string
{
    return $_SERVER['REQUEST_METHOD'];
}

function is_get():bool
{
    return request_method() == "GET";
}

function is_post():bool
{
    return request_method() == "POST";
}

function is_put():bool
{
    return request_method() == "PUT";
}

function is_patch():bool
{
    return request_method() == "PATCH";
}

function is_delete():bool
{
    return request_method() == "DELETE";
}


// application/user helpers
function get_a_request_id(){
    $randString = strtoupper(substr(uniqid(), 0, 8));
    date_default_timezone_set("Africa/Lagos");
    $date = date('Ymdhm');
    $id = $date . $randString;

    return $id;
}

function is_authenticated(): bool
{
    if (!isset($_SESSION['user_id'])) {
        return false;
    }
    return true;
}

// check if token is set
function is_authorized()
{
    $headers = apache_request_headers();
    $token = $headers['X-API-KEY'] ?? $headers['Authorization'];
    if (!isset($token)) {
        return false;
    }
    return true;
}

// get the token
function get_token()
{
    $headers = apache_request_headers();
    $token = $headers['X-API-KEY'] ?? $headers['Authorization'];
    if (!isset($token))
        return null;
    return trim(str_replace("Token", "", $token));
}
function is_verified(int|string $unique_id): bool
{
    global $con;
    $get_verified_user = $con->query("SELECT * FROM user WHERE apiKey='$unique_id' OR email='$unique_id' OR id='$unique_id' OR username='$unique_id' AND status='1'");
    $isVerified = ($get_verified_user->num_rows >= 1) ? true : false;
    return $isVerified;
}
function user(int|string $unique_id): object
{
    global $con;
    $get_user = $con->query("SELECT * FROM user WHERE apiKey='$unique_id' OR email='$unique_id' OR id='$unique_id' OR username='$unique_id' ");
    $user = $get_user->fetch_object();
    return $user;
}

function is_balance_sufficient(string|int|float $amount, string|int $user_id): bool
{
    $user = user($user_id);
    $balance = $user->bal;
    if ((float) $amount > (float) $balance)
        return false;
    return true;
}
function debit(string|int|float $amount, $user_id)
{
    global $con;
    $user = user($user_id);
    if (is_balance_sufficient($amount, $user->id)) {
        $user->bal -= (float) $amount;
        $deduct_balance = $con->query("UPDATE user SET bal='$user->bal' WHERE id='$user->id' ");
        return $deduct_balance;
    }
    return false;
}

function credit(string|int|float $amount, $user_id)
{
    global $con;
    $user = user($user_id);
    $user->bal += (float) $amount;
    $credit_balance = $con->query("UPDATE user SET bal='$user->bal' WHERE id='$user->id' ");
    return $credit_balance;
}

function get_mail_setup(): object|array
{
    global $con;
    $mail = $con->query("SELECT * from mail");
    $settings = $mail->fetch_object();
    return $settings;
}

function get_template(string $filename, array $params): string
{
    $template = new Template(dirname(__DIR__) . "/core/mail/", []);
    return $template->render($filename, $params);
}

function send_mail(string $subject, string $to, string $body)
{
    $settings = get_mail_setup();
    date_default_timezone_set('Africa/Lagos');
    $date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
    require "../Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = $settings->host;
    $mail->Port = 465;
    $mail->Username = $settings->username;
    $mail->Password = $settings->password;
    $mail->IsHTML(true);
    $mail->setFrom($settings->sender);
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    if (!$mail->send()) {
        return false;
    }
    return true;

}

function is_cable_locked(string $service)
{
    global $con;
    $get_cable_lock_status = $con->query("SELECT * FROM cable_lock");
    $cable_lock_status = $get_cable_lock_status->fetch_array();
    $locked_status = ($cable_lock_status[strtolower($service)] == "on") ? false : true;
    return $locked_status;
}