<?php
require_once "../core/conn.php";
header("Content-type: application/json; charset=UTF-8");
$response = [];

if (isset($_POST["sme_plug"]) ||  isset($_POST["sme_plug"])) {
    $sme_plug = $_POST["sme_plug"];
    $sme_plug_url = $_POST["sme_plug_url"];

	// Update SME_Plug API TOKEN
    if (!empty($sme_plug)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET smeplug='$sme_plug'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change api key";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "API Key is missing, please supply that field!"; 
    }
	// Update the SME PLUG Website URL
    if (!empty($sme_plug_url)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET smeplugurl='$sme_plug_url'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
            
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change api website url";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "API Website URL is missing please supply that field!"; 
    }
} 
// ---------------
// DATA API UPDATE
// ---------------
else if (isset($_POST["data_plug_url"]) ||  isset($_POST["data_plug_key"])) {
    $data_plug_url = $_POST["data_plug_url"];
    $data_plug_key = $_POST["data_plug_key"];

	// Update SME_Plug API TOKEN
    if (!empty($data_plug_key)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET data_plug_api_key='$data_plug_key'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change data plug api key";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Data API Key is missing, please supply that field!"; 
    }
	// Update the SME PLUG Website URL
    if (!empty($data_plug_url)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET data_plug_url='$data_plug_url'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
            
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change Data api website url";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Data API Website URL is missing please supply that field!"; 
    }
} 
// ----------------
// Topup API Update
// ----------------
else if (isset($_POST["topup_plug_url"]) ||  isset($_POST["topup_plug_key"])) {
    $topup_plug = $_POST["topup_plug_url"];
    $topup_plug_key = $_POST["topup_plug_key"];

	// Update SME_Plug API TOKEN
    if (!empty($topup_plug_key)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET topup_plug_api_key='$topup_plug_key'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change Topup api key";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Topup API Key is missing, please supply that field!"; 
    }
	// Update the SME PLUG Website URL
    if (!empty($topup_plug)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET topup_plug_url='$topup_plug'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
            
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change Topup api website url";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Topup API Website URL is missing please supply that field!"; 
    }
}
// -----------------
// Cable Plug Update
// -----------------
else if (isset($_POST["cable_plug_url"]) ||  isset($_POST["cable_plug_key"])) {
    $cable_plug = $_POST["cable_plug_url"];
    $cable_plug_key = $_POST["cable_plug_key"];

	// Update SME_Plug API TOKEN
    if (!empty($cable_plug_key)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET cable_plug_api_key='$cable_plug_key'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change Cable api key";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Cable API Key is missing, please supply that field!"; 
    }
	// Update the SME PLUG Website URL
    if (!empty($cable_plug)) {
		$update = mysqli_query(
            $con,
            "UPDATE simhosting SET cable_plug_url='$cable_plug'"
        );
        if ($update) {
            $response["title"] = "success";
            $response["status"] = 200;
            $response["message"] = "success";
            
        } else {
            $response["title"] = "opps";
            $response["status"] = "error";
            $response["message"] = "unable to change Cable api website url";
        }
    }else{
        $response["tittle"] = "opps";
        $response["status"] = "error";
        $response["message"] = "Cable API Website URL is missing please supply that field!"; 
    }
} else {
    $response["title"] = "Client Error!";
    $response["status"] = "error";
    $response["message"] = "You have not added any data!";
}
echo json_encode($response);
