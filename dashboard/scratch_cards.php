<?php
session_start();
if (isset($_SESSION['name'])) {
    require_once '../core/conn.php';
    $das = "4";
    $aemail = $web['email'];
    $user = $_SESSION['id'];
    $sql = mysqli_query($con, "SELECT * FROM user WHERE id = '$user' ");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    $msg = "";
    $chek = mysqli_query($con, "SELECT * FROM pay");
    $pdata = mysqli_fetch_array($chek);
    $min = $pdata['min'];
    $bal = $row['bal'];
    $pin = $row['pin'];
    $cable = mysqli_query($con, "SELECT * FROM scratch_card_prices");
    $cable_discount = mysqli_fetch_array($cable);
    $waec = $cable_discount['waec_card'];
    $neco = $cable_discount['neco_token'];
    $nabteb = $cable_discount['nabteb_token'];
    ?>
    <?php include '../includes/header.php'; ?>
    <div class="main-panel ">
        <link rel="stylesheet" href="/static/ogbam/form.css">
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
        </style>
        <div style="padding:90px 15px 20px 15px">
            <h2 class="w3-center"> Generate Result Checker Pin</h2>
            <div class="box w3-card-4">
                <form method='post' id="form_result_checker">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="hidden" name="csrfmiddlewaretoken" value="CtB4mBGDG8lzUOdghN1NXiyeWIZE2qUgczlu8CUVQ3u5aeLcU2cnoJcDSmG1qe2U">
                            <input type="hidden" name="sessionID" id="sessionID" value="<?php echo $user ?>">
                            <div id="div_id_exam_name" class="form-group">
                                <label for="id_exam_name" class=" requiredField">
                                    Exam name<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <select name="exam_name" class="select form-control" required id="id_exam_name">
                                        <option value="" selected>-----SELECT EXAM-----</option>
                                        <option value="waec">WAEC</option>
                                        <option value="neco">NECO</option>
                                        <option value="nabteb">NABTEB</option>
                                    </select>
                                </div>
                            </div>
                            <div id="div_id_quantity" class="form-group">
                                <label for="id_quantity" class=" requiredField">
                                    Quantity<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <input type="number" name="quantity" value="1" min="1" max="5"
                                        class="numberinput form-control" required id="id_quantity">
                                </div>
                            </div>
                            <label><b>Amount</b></label>
                            <input class="form-control" id="amount" value="" readonly/>
                            <button type="button" class="btn" style='color: white;' id="btnsubmit"> Generate</button>
                        </div>
                        <div class="col-sm-4  ">
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        async function getInfo(serviceID){
            const url = `/api/exam/?service=${serviceID}`;

            const response = await fetch(url);

            if (!response.ok) {
                const serverResponse = await response.json();
                throw new Error(`${serverResponse}`);
            }

            const data = await response.json();

            return data;
        }
        $(document).ready(function () {
            $("#id_exam_name").change(async function () {
                var selectednetwork = $("#id_exam_name option:selected").val();
                var quantity = $("#id_quantity").val();

                 
                let cardAmount = {};
                try{
                   cardAmount = await getInfo(selectednetwork);
                   $("#amount").val("₦" + quantity * Number(cardAmount.variation_amount));
                }catch(error){
                    Swal.fire({
                        icon: 'error',
                        title:"Error",
                        text:`Oops! ${error}` 
                    })
                }
                    
            });
            $("#id_quantity").keyup(async function(){
                //var selectednetwork = $(this).children("option:selected").val();
                var selectednetwork = $("#id_exam_name option:selected").val();
                var quantity = $("#id_quantity").val();
                if (quantity > 5) {
                    $("#amount").text("Maximum per is 5");
                }

                let cardAmount = {};
                try{
                   cardAmount = await getInfo(selectednetwork);
                   $("#amount").val("₦" + quantity * Number(cardAmount.variation_amount));
                }catch(error){
                    Swal.fire({
                        icon: 'error',
                        title:"Error",
                        text:`Oops! ${error}` 
                    })
                }                
            });
        });
    </script>
    <script>
        $("#btnsubmit").click(function(){
            var url = "/api/epin/"; // get the url of the `load_cities` view
            var exam_name = $("#id_exam_name").val(); // get the selected country ID from the HTML input
            var quantity = $("#id_quantity").val();
            var amount =    $("#amount").val()
            var token = 'CtB4mBGDG8lzUOdghN1NXiyeWIZE2qUgczlu8CUVQ3u5aeLcU2cnoJcDSmG1qe2U';
            var sessionID = document.getElementById('sessionID');
            var resultCheckerForm = document.getElementById('form_result_checker').elements;

            if(exam_name == "" && quantity == "" && amount == ""){
                return swal("All fields are required!");
            }

            swal({
                title: 'Dear Adex',
                text: "Are you sure you want to generate " + " " + quantity + " pieces of " + exam_name + "   pin",
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    //start
                    swal("Enter Your Pin:", {
                        content: "input",
                    })
                    .then((value) => {
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: () => $.LoadingOverlay("show"),
                            url: `/api/checkpin.php?pin=${value}&user=${sessionID.value}`,
                            headers: { "X-CSRFToken": token },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $.LoadingOverlay("hide");
                                console.log(errorThrown)
                                if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                    swal("Oops!", String(XMLHttpRequest.responseText), "error")
                                }
                                else if (JSON.parse(XMLHttpRequest.responseText).error) {
                                    swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).error), "error")
                                }
                                else {
                                    swal("Oops!", String(XMLHttpRequest.responseText), "error")
                                }
                            },
                            success: function(data){
                                $.ajax({
                                    type: 'POST',
                                    beforeSend: () => $.LoadingOverlay("show"), // initialize an AJAX request
                                    url: "/api/exam/",
                                    headers: {
                                         "Authorization": `Token ${sessionID.value}` 
                                    },
                                    data: {
                                        "exam_name": resultCheckerForm.exam_name.value,
                                        "quantity" : resultCheckerForm.quantity.value,
                                        "amount" : resultCheckerForm.amount.value.replace("₦","")
                                    },
                                    success: function (data){
                                        swal({
                                            title: "Successful!",
                                            text: "You purchased " + quantity + ' pieces of ' + exam_name + " Epin ",
                                            icon: "success",
                                            button: "View reciept",
                                        })
                                        $('.swal-button--confirm').click(function () {
                                            $.ajax({
                                                beforeSend: () => $.LoadingOverlay("show"),
                                                success: window.location.href = 'result-checker-pin.php?id=' + String(data.id)
                                            });
                                        });
                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        $.LoadingOverlay("hide");
                                        console.log(errorThrown)
                                        if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                            swal("Oops!", "Something went wrong please contact admin ", "error")
                                        }
                                        else if (JSON.parse(XMLHttpRequest.responseText).error) {
                                            swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).error), "error")
                                        }
                                        else {
                                            swal("Oops!", String(XMLHttpRequest.responseText), "error")
                                        }
                                    },
                                    complete: () => $.LoadingOverlay("hide")
                                });
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $.LoadingOverlay("hide");
                                console.log(textStatus)
                                if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                    swal("Oops!", "Something went wrong please contact admin ", "error")
                                }
                                else {
                                    var parsed_data = JSON.parse(XMLHttpRequest.responseText);
                                    swal("Oops!", String(parsed_data.error), "error")
                                }
                            },
                            complete: () => $.LoadingOverlay("hide")
                        });
                    });
                //end
                }
                else {
                    swal("Cancelled!");
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- GetButton.io widget -->
    <?php require_once '../includes/footer.php'; ?>
    <?php if ($pin == '') { ?>
        <script>
            $(document).ready(function () {
                swal({
                    text: "<?php echo $row['name']; ?>, You have not create a transaction pin please create one now",
                    icon: "info",
                    button: "ok",
                    timer: 60000,
                }).then(() => {
                    window.location = "newpin.php"
                });
            });
        </script>
    <?php } else { ?>
    <?php exit; } ?>
    <?php if ($min > $bal) { ?>
        <script>
            $(document).ready(function () {
                swal({
                    text: "<?php echo $row['name']; ?>, Wallet below minimum vending amount ₦<?php echo $row['bal']; ?>",
                    icon: "info",
                    button: "ok",
                    timer: 60000,
                }).then(() => {
                    window.location = "index.php"
                });
            });
        </script>
    <?php } else { ?>
    <?php  exit; }?>
    </body>
    </html>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
    exit;
}
?>