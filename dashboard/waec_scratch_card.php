<?php
session_start();
if (isset($_SESSION['name'])) {
require_once "../core/conn.php";

    $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
$das="";
    $msg = "";
    $sql = mysqli_query($con, "SELECT * FROM  mail");
    if (mysqli_num_rows($sql) > 0) {
        $mail = mysqli_fetch_assoc($sql);
    }
 $checkpin=$row['pin'];
        if ($checkpin == '') {
    echo "<script>
alert('you have not create a pin please create a transaction pin');
window.location.href='newpin.php';</script>";
}


    // Checking if neco cards are available for purchase
    $card_checking = mysqli_query($con, "SELECT * FROM waec_scratch_card WHERE status='0' ");
    if (mysqli_num_rows($card_checking) > 0) {
    } else { ?>
        <script>
            alert("Waec result token is currently out of stock please check back later");
        </script>
        <script>
            window.location.href = "index.php";
        </script>
        <?php }


    $bal = $row['bal'];
    $email = $row['email'];
    $name = $row['name'];
    $uid = $row['id'];
    $username = $row['username'];
    $musername = $mail['username'];
    $mpassword = $mail['password'];
    $host = $mail['host'];
    $sender = $mail['sender'];
    date_default_timezone_set('Africa/Lagos');
    $date = date("l j<\s\up>S</\s\up>, F Y @ g:ia");
    $chek = mysqli_query($con, "SELECT * FROM pay");

    $pdata = mysqli_fetch_array($chek);
    $min = $pdata['min'];

    if (isset($_POST['generate'])) {

        $exam = mysqli_real_escape_string($con, $_POST['exam']);
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        $amount = mysqli_real_escape_string($con, $_POST['amount']);
        $total = $bal - $amount;
        if (!empty($quantity) && ($amount)) {
            if ($amount > $bal) {
                // "insufficient bal";
                $msg = '<div class="alert alert-warning"><strong>
            <span class="text-danger">Your balance is insufficent please fund your account to continue </span></strong><br />
            <a href="pay.php" class="btn btn-primary bg-dark"> Fund  Account</a>';
            }
            //printing the card

        ?>
            <style>
                .table-curved {
                    margin: 30px auto 55px auto;
                    width: 97%;
                }

                .table-curved-body {
                    font-size: 22px !important;
                    color: #000000;
                }

                td,
                th {
                    border: 3px solid #dddddd;
                    text-align: center;
                    padding: 36px;
                }

                tr:hover {
                    background-color: #e7e7e7 !important;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }

                /* -----------Smartphone View----------- On screens that are 480px wide or less */
                @media screen and (max-width: 480px) {

                    .table-curved {
                        display: block;
                    }

                    .table-curved-body {
                        font-size: 12px !important;
                        color: #000000;
                    }

                    td,
                    th {
                        padding: 6px;
                    }

                    .table-curved {
                        margin: 30px auto 25px auto;
                    }

                }
            </style>

            <p align="center">
            </p>
            <div align="center">
            </div>
            <table class="table-curved">
                <tbody class="table-curved-body">

                    <tr>
                        <th>S/N</th>
                        <th>CARD TYPE</th>
                        <th>CARD PIN NO</th>
                        <th>CARD SERIAL NO</th>

                    </tr>

                    <tr bgcolor="#f7f7f7" valign="center" align="center">
                        <?php
                        $card_print = mysqli_query($con, "SELECT * FROM neco_result_token WHERE status='0' LIMIT $quantity");
                        $nu = 1;

                        if (mysqli_num_rows($card_print) == 0) {
                        }
                        while ($rows = mysqli_fetch_array($card_print)) {
                            $card_id = $rows['id'];
                        ?>

                            <div class="slider-section">
                                <div class="container">
                                    <div class="row">

                                        <div style="margin: auto; display: block; float: right;">
                                            <a onclick="javascript:location.href='dashboard.php'" id="print_button1" style="width: 150px; padding: 5px 8px 5px 8px;text-align: center;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;"><span style="cursor: pointer;">Back to Dashboard</span></a>
                                            <a href="javascript:window.print()" id="print_button2" style="width: 150px; padding: 5px 8px 5px 8px;text-align: center;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;">Print Scratch Card(s)</a>
                                        </div>

                                        <td><?php echo htmlentities($nu);
                                            echo '.';  ?></td>
                                        <td>NECO Result Token</td>
                                        <td><?php echo $rows['pin']; ?></td>
                                        <td><?php echo $rows['serial_no']; ?></td>


                    </tr>
                <?php $nu = $nu + 1;
                            //update card status
                            $update_card = mysqli_query($con, "UPDATE neco_result_token SET status='1', time_bought=NOW() WHERE id='$card_id'");
                            //update buyer bal
                            $rem_bal = $bal - $amount;
                            $update_bal = mysqli_query($con, "UPDATE user SET bal='$rem_bal' WHERE id='$uid'");
                        }  ?>

                </tbody>
            </table>

            <img style="margin: auto; display: block;" alt="Thank You" src="images/Thank-you_icon.png">
            <h2 style="color:black; font-size:30pt; font-style:italic; font-family: sans-serif; text-align:center;">Serving you is always a pleasure</h2>

            <p></p>






            <br><br>
            </div>
            </div>

    <?php




        } else {
            $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please put how many pins you want to buy </strong>';
        }
    }

    ?>

    <?php include '../includes/header.php'; ?>        
        <div class="main-panel ">
                

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    #process{
        display: none;
    }



     /--thank you pop starts here--/
     .thank-you-pop{
      width:100%;
       padding:20px;
      text-align:center;
    }
    .thank-you-pop img{
      width:76px;
      height:auto;
      margin:0 auto;
      display:block;
      margin-bottom:25px;
    }

    .thank-you-pop h1{
      font-size: 42px;
        margin-bottom: 25px;
      color:#5C5C5C;
    }
    .thank-you-pop p{
      font-size: 20px;
        margin-bottom: 27px;
       color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
      font-size: 25px;
        margin-bottom: 40px;
      color:#222;
      display:inline-block;
      text-align:center;
      padding:10px 20px;
      border:2px dashed #222;
      clear:both;
      font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
      color:#03A9F4;
    }
    .thank-you-pop a{
      display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
      margin-right:5px;
      color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }
   

</style>

<div style="padding:90px 15px 20px 15px" >

<div style="padding:90px 15px 20px 15px" >


                            <h2 class="w3-center"> Generate Waec Scratch Card(s)</h2>
                            <div outpc=""><?= $msg; ?></div>

                            <div class="box w3-card-4">

                                <form method='post' id="form_id" action="confirmorders.php">


                                    <div class="row">

                                        <div class="col-sm-8">

                                            <input type="hidden" name="csrfmiddlewaretoken" value="pj79HBbx3yl9Nbff3YU8tUCmBpfiJOsaD58wez6HJ3rR2CBeQDxDXjX7ObV0vog0">








                                            <div id="div_id_exam_name" class="form-group">

                                                <input type="text" name="dbcheck" class="form-control" value="waec_scratch_card" hidden />
                                                <input type="text" name="card_type" class="form-control" value="WAEC SCRATCH CARD" hidden />









                                                <div class="">
                                                    <select name="exam" class="select form-control" required id="id_exam_name" readonly hidden>


                                                        <option value="WAEC">WAEC</option>

                                                    </select>














                                                </div>


                                            </div>











                                            <div id="div_id_quantity" class="form-group">

                                                <label for="id_quantity" class=" requiredField">
                                                    Quantity<span class="asteriskField" style="color:red;font-weight:bold"> *</span>
                                                </label>








                                                <div class="">
                                                    <input type="number" name="quantity" min="1" max="5" class="numberinput form-control" required id="id_quantity">












                                                </div>


                                            </div>

                                            <label><b>Amount</b></label>
                                            <input type="text" name="amount" class="numberinput form-control" required id="amount" readonly="readonly">




                                            <button type="submit" class=" btn" style='  color: white;' name="generate"> Generate</button>

                                        </div>
                                        <div class="col-sm-4  ">





                                        </div>

                                    </div>
                            </div>






                        </div>
                    </div>

                </div>




























            </div>

            <!-- GetButton.io widget -->
            <?php require_once '../includes/footer.php'; ?>


            <?php
            $check_amount = mysqli_query($con, "SELECT * FROM scratch_card_prices");
            if (mysqli_num_rows($check_amount) > 0) {
                $result = mysqli_fetch_array($check_amount);
                $amount = $result['waec_card'];
            }
            ?>
            <script>
                $(document).ready(function() {
                    $("#id_exam_name").change(function() {
                        var selectednetwork = $("#id_exam_name option:selected").val();
                        var quantity = $("#id_quantity").val();
                        if (selectednetwork == "WAEC") {
                            $("#amount").val(quantity * Number('<?=$amount;?>'));


                        } else if (selectednetwork == "NECO") {
                            $("#amount").val(quantity * Number('<?=$amount;?>'));
                        }
                    });

                    $("#id_quantity").keyup(function() {
                        //var selectednetwork = $(this).children("option:selected").val();
                        var selectednetwork = $("#id_exam_name option:selected").val();
                        var quantity = $("#id_quantity").val();
                        console.log(quantity)
                        console.log(selectednetwork)

                        if (quantity > 5) {
                            $("#amount").val("Maximum per is 5");

                        } else if (selectednetwork == "WAEC") {
                            $("#amount").val(quantity * Number('<?= $amount; ?>'));




                        } else if (selectednetwork == "NECO") {
                            $("#amount").val(quantity * Number('<?=$amount;?>'));
                        }


                    });





                });
            </script>
    </body>

    </html>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
    exit;
}

?>

</html>