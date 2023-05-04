<?php
    $sql = mysqli_query($con, "SELECT * FROM simhosting");
    if(mysqli_num_rows($sql) > 0) {
        $apis = mysqli_fetch_assoc($sql);
    }

    $data_api_url = $apis['data_plug_url'] ?? $apis['smeplugurl'];
    $data_api_secret = $apis['data_plug_api_key'] ?? $apis['smeplug'];

    $topup_api_url = $apis['topup_plug_url'] ?? $apis['smeplugurl'];
    $topup_api_secret = $apis['topup_plug_api_key'] ?? $apis['smeplug'];

    $cable_api_url = $apis['cable_plug_url'] ?? $apis['smeplugurl'];
    $cable_api_secret = $apis['cable_plug_api_key'] ?? $apis['smeplug'];
?>