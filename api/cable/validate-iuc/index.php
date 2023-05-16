<?php
require_once dirname(__DIR__) . "/cable.class.php";

if (isset($_GET['iuc']) && isset($_GET['biller'])) {
    try {
        echo $cable->validate_iuc($_GET['iuc'], $_GET['biller']);
    } catch (Exception $e) {
        echo $e->getMessage();
        return http_response_code(500);
    }
} else {
    return http_response_code(400);
}