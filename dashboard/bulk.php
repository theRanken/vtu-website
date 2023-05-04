<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once '../core/conn.php';
  require_once '../core/api.php';
  $da = "";
  $msg = "";
  $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
  if
  (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
  }

  $bal = $row['bal'];
  $chek = mysqli_query($con, "SELECT * FROM pay");
  $pdata = mysqli_fetch_array($chek);
  $min = $pdata['min'];
  $refbal = $row['refbal'];
  ?>
<?php 
  if (isset($_POST['submit'])) {
    $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>we are working on the bulk sms please check back later thanks</strong></div>';
  }
?>
<?php include '../includes/header.php'; ?>
<!-- End Sidebar -->

<div class="main-panel ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    #process {
        display: none;
    }



    /--thank you pop starts here--/ .thank-you-pop {
        width: 100%;
        padding: 20px;
        text-align: center;
    }

    .thank-you-pop img {
        width: 76px;
        height: auto;
        margin: 0 auto;
        display: block;
        margin-bottom: 25px;
    }

    .thank-you-pop h1 {
        font-size: 42px;
        margin-bottom: 25px;
        color: #5C5C5C;
    }

    .thank-you-pop p {
        font-size: 20px;
        margin-bottom: 27px;
        color: #5C5C5C;
    }

    .thank-you-pop h3.cupon-pop {
        font-size: 25px;
        margin-bottom: 40px;
        color: #222;
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        border: 2px dashed #222;
        clear: both;
        font-weight: normal;
    }

    .thank-you-pop h3.cupon-pop span {
        color: #03A9F4;
    }

    .thank-you-pop a {
        display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }

    .thank-you-pop a i {
        margin-right: 5px;
        color: #fff;
    }

    #ignismyModal .modal-header {
        border: 0px;
    }

    /--thank you pop ends here--/
    </style>

    <div style="padding:90px 15px 20px 15px">
        <div class="outputc">
            <?= $msg; ?>
        </div>

        <h2 class="w3-center">BulkSms</h2>

        <div class="box w3-card-4">

            <form method='post' id="dataform">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="hidden" name="csrfmiddlewaretoken"
                            value="3jjCkSBjujnR7RGjEe19cUcAXcUjAZQmzmb7O5NsXpoUltXy6RDHB7ndoZDp2lM1" />

                        <div id="div_id_sendername" class="form-group">
                            <label for="id_sendername" class=" requiredField">
                                From [Sendername]: <span class="asteriskField">*</span>
                            </label>
                            <div class="">
                                <input type="text" name="sendername" maxlength="12"
                                    class="textinput textInput form-control" required id="id_sendername">
                            </div>
                        </div>

                        <div id="div_id_to" class="form-group">
                            <label for="id_to" class=" requiredField">
                                To [Recipients]: <span class="asteriskField">*</span>
                            </label>

                            <div class="">
                                <textarea name="to" cols="1" rows="4" maxlength="4000" class="textarea form-control"
                                    required id="id_to"></textarea>

                                <small id="hint_id_to" class="form-text text-muted">
                                    Type or Paste up to 10,000 phone numbers here
                                    (080... or 23480...) separate with comma ,NO SPACES!
                                </small>
                            </div>


                        </div>











                        <div id="div_id_message" class="form-group">

                            <label for="id_message" class=" requiredField">
                                Message<span class="asteriskField">*</span>
                            </label>
                            <div class="">
                                <textarea name="message" cols="1" rows="4" maxlength="4000"
                                    class="textarea form-control" required id="id_message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="div_id_DND" class="form-check">
                                <input type="checkbox" name="DND" class="checkboxinput form-check-input" id="id_DND">
                                <label for="id_DND" class="form-check-label">
                                    Select this to ensure delivery to DND numbers at 2 units per number.
                                </label>
                            </div>


                        </div>

                        <button type="submit" name="submit" value="Continue to Funding"
                            class="logo-header btn bg-secondary-gradient" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;  margin-left: auto;
    margin-right: auto;
    width: 8em"> Proceed</button>

                    </div>
                    <div class="col-sm-4  ">

                        <h2> ₦3.5 per unit </h2>

                    </div>

                </div>
        </div>




        <script>
        $(function() {
            $('#btnsubmit').on('click', function() {
                $(this).text('Please wait ...')
                    .attr('disabled', 'disabled');
                $('#dataform').submit();
            });

        });
        </script>


    </div>

</div>



</div>
</div>






<script>
$(document).ready(function() {
    $('table.display').DataTable({
        "aaSorting": [
            []
        ]
    });

    $('#multi-filter-select').DataTable({
        "pageLength": 5,
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $(
                        '<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });

    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action =
        '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action
        ]);
        $('#addRowModal').modal('hide');

    });
});
</script>

<script>
$('#datepicker').datetimepicker({
    format: 'YYYY-MM-DD',
});

$('#id_DOB').datetimepicker({
    format: 'YYYY-MM-DD',
});

$('#datepicker2').datetimepicker({
    format: 'YYYY-MM-DD',
});

$('#basic').select2({
    theme: "bootstrap"
});
</script>
<?php include '../includes/footer.php'; ?>
<?php if ($min > $bal) { ?>
?>
<script>
$(document).ready(function() {
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
<?php
    exit;
  }
  ?>
</body>

<?php
} else {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>