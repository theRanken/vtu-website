 <!DOCTYPE html>
  <html>
  <head>
    
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  
  <!-- CSS Files -->
  
  <head>
  
<body>


<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="successModalCenterTitle">Order Submited succesfully</h5>

          </div>
        <div class="modal-body">

<table class='table table-all'>
    <tr>

        <td><b>ID</b></td>
        <td id="ref"></td>
    </tr>

    <tr>

        <td><b>Amount</b></td>
        <td id="amt"></td>
    </tr>

    <tr>

        <td><b>Paid Amount</b></td>
        <td > <span></span>₦<span id="paid"></span></td>
    </tr>

    <tr>

        <td><b>Previous Balance</b></td>
        <td><span></span>₦<span id="before"></span></td>
    </tr>

    <tr>
          <td><b> New Balance </b></td>
        <td> <span></span>₦<span id="after"></span></td>
    </tr>
    <tr>

        <td><b>Mobile Number</b></td>
        <td id="num"> </td>
    </tr>

    <tr>

        <td><b>Network</b></td>
        <td id ="net"></td>
    </tr>

    <tr>

        <td><b>Status</b></td>
        <td id ="status"></td>
    </tr>

</table>

        </div>

        <div class="modal-footer">
            <a href = "/profile" class="btn btn-secondary">OK</a>

          </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
            <div class="thank-you-pop">
              <img src="https://www.pngmart.com/files/10/Stop-Sign-Transparent-Background.png" alt="">
              <p id ="errmessage" style="font-size: 20px;"></p>
              <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>

             </div>
          </div>
      </div>
    </div>
  </div>
</head>
  <body>
  
  </body>
  </html>