<?php
$temp='
<html>
<head>
<style>
.table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


.button {
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;
  cursor: pointer;
  
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}

</style>
</head>

<body>

<b><span>'.$web['name'].'</span></b>

<h3>Hey Admin,</h3>

'.$username.', Transfer Airtime to you on '.$date.'.<br>

<strong>Your transaction details are as follows:</strong> <p>

<table class"table" >
  
  <tr>
    <td>Amount Sent</td>
    <td>N<span>'.$amount.'</span></td>
  </tr>
   <tr>
    <td>Amount To be Paid</td>
    <td><span>'.$amount_pay.'</span></td>
  </tr>
   <tr>
    <td>Network</td>
    <td> <span>'.$network.'</span></td>
  </tr>
  <tr>
  <tr>
    <td>Mobile Number</td>
    <td> <span>'.$phone.'</span></td>
  </tr>
  <tr>
  <td>Fund Type</td>
  <td>'.$adex.'</td>
  </tr>
  <tr>
    <td>Date</td>
    <td> <span>'.$date.'</span></td>
  </tr>
  <tr>
</table> <p>


Thank you for choosing <span>'.$web['name'].'</span> <p>
 
<p>

</body><html>



';
?>