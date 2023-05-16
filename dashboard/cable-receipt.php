<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:#fff;;min-width:auto;" class="no-touch">
            <div class="container mt-5" id="receipt">
                <header class="w-100 d-flex justify-content-center text-center mt-5 align-items-center pt-2 pb-2" >
                <img src="../upload/<?php echo $web['image']; ?>" srcset="../upload/<?php echo $web['image']; ?> 2x" alt="logo">
                <legend class="h1 font-weight-bold"><?php echo $web['name']; ?></legend>
                </header>
                <?php
                 if (isset($_GET['id'])) {
                    $ref = $_GET['id'];
                    $chek = mysqli_query($con, "SELECT * FROM transactions WHERE transid='$ref' ");
                    $data = mysqli_fetch_array($chek);
                    $plan = $data['plans'];
                    $number = $data['mobile'];
                    $network = $data['network'];
                    $amount = $data['amount'];
                    $status = $data['status'];
                    $username = $data['username'];
                    $trans = $data['transid'];
                    $date = $data['date'];
                    $oldbal = $data['oldbal'];
                    $newbal = $data['newbal'];
                    $adex = mysqli_query($con, "SELECT * FROM user WHERE username='$username' ");
                    $users = mysqli_fetch_array($adex);
                    $new = $users['bal'];
                    $before = $new + $amount;
                } else {
                    echo "<script>document.location.href='index.php'; </script>";
                }
                ?>
                <h6 class="card-sub-title">Your Transaction Details are as Follows:</h6>
                    <div class="alert alert-success alert-center alert-dismissible fade show">
                        You <? echo ($status == 1)?"successfully" : "failed to"; ?>  purchased <b><? echo $plan; ?></b> to <? echo $number ?>.
                    </div>
                    <ul class="data-details-list">
                        <li>
                            <div class="data-details-head">Service Name</div>
                            <div class="data-details-des"><b><? echo $network; ?></b></div>
                        </li>
                        <li>
                            <div class="data-details-head">Plan Size</div>
                            <div class="data-details-des"><b><? echo $plan; ?></b></div>
                        </li>
                                        <li>
                            <div class="data-details-head">Previous Balance</div>
                            <div class="data-details-des"><b>₦<? echo number_format($oldbal, 2); ?></b></div>
                        </li>
                        <li>
                            <div class="data-details-head">New Balance</div>
                            <div class="data-details-des"><b>₦<? echo number_format($newbal, 2); ?></b></div>
                        </li>
                        <li>
                            <div class="data-details-head">Amount</div>
                            <div class="data-details-des"><b>₦<? echo number_format($amount, 2); ?></b></div>
                        </li>
                        <li>
                            <div class="data-details-head">Phone</div>
                            <div class="data-details-des"><b><?php echo $number; ?></b></div>
                        </li>
                                    <li>
                        <div class="data-details-head">Transaction ID</div>
                        <div class="data-details-des"><b>DATASUB<? echo $trans; ?></b></div>
                    </li> 
                    <li>
                        <div class="data-details-head">Status</div>
                        <div class="data-details-des"><b><? echo $main; ?></b></div>
                    </li>
                    <li>
                        <div class="data-details-head">Date</div>
                        <div class="data-details-des"><b><? echo $date; ?></b></div>
                    </li>
                </ul>
            </div>
            <center>
                <div style="margin-bottom:20px; padding-top: 15px;">
                       <button class="btn btn-info" onclick="printContent('receipt');">Print</button> <button class="btn btn-info" id="btnPrint">Save</button>
                </div>
            </center>
            <script>
                function printContent(el){
                var restorepage = $('body').html();
                var printcontent = $('#' + el).clone();
                $('body').empty().html(printcontent);
                window.print();
                $('body').html(restorepage);
                }
                </script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
         document.getElementById('btnPrint').addEventListener('click',
         Export);
    function Export() {
              html2canvas(document.getElementById('receipt'), {
                  onrendered: function (canvas) {
                      var data = canvas.toDataURL();
                      var docDefinition = {
                          content: [{
                              image: data,
                              width: 500
                          }]
                      };
                      pdfMake.createPdf(docDefinition).download("receipt.pdf");
                  }
              });
          }  
          </script>
    </body>
</html>
