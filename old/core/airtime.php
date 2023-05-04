<?php
$temp='
<div class="modal fade" id="processModal" tabindex="-1" role="dialog" aria-labelledby="processModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title" id="processModalLongTitle"> To complete this request, follow the instructions below.</h4></center>
        </div>
        <div class="modal-body">
          <p>
            <h5 class=w3-text-blue  w3-padding id="instruction"> </h5>
        </p>
        <hr>
        How to Transfer on <span>' .$network. ' </span>
         <br>
        Before you send an airtime, you must have created a pin 
        <br>
 <b>Create Pin:</b><span>' .$code. ' </span>

        <p id ="opt3"> </p>

<span>Transfer through <b>Transfer Code:</b></span>  <span>' .$codes. ' </span>
        <p id ="opt4"> </p>

          </p>

        <p><b>NOTE: Ensure you have paid N<span>' .$amount. ' </span>  into the number above before clicking on airtime sent. Also, you must sent the exact <span id="amtm"></span> airtime within 30 minutes or this transaction will be cancelled.</b></p>
        <P><b>NOTE: After you have created your pin, reply this email by requesting for our number <span>' .$network. ' </span> Number</p>

          <p style="color:red;" class="blink_me"><b>NOTE:</b> You can contact us </p>
          <br> 
          Phone Number : <span>' .$web['phone']. ' </span>
          Email :  <span>' .$web['email']. ' </span>
      </div>
        
           </div>
      </div>
    </div>
  </div>
';
?>