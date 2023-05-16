<?php 
require_once '../core/conn.php';
$sql = mysqli_query($con, "SELECT * FROM  general order by id desc LIMIT 1");
            if 
            (mysqli_num_rows($sql) > 0){
              $web = mysqli_fetch_assoc($sql);
            }
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

<h3>Hello '.$user.',</h3>

The purpose of this email is to inform you that you have been debited for the loan u borrowed on '.$loandate.' <br>

<strong>The  details are as follows:</strong> <p>

<table class"table" >
  <tr>
    <td>Amount</td>
    <td>N<span>'.$amount.'</span></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><span>'.$email.'</span></td>
  </tr>
  <tr>
  <td>Old Balance</td>
  <td>'.number_format($bal,2).'</td>
  </tr>
   <tr>
    <td>New Balance</td>
    <td><span>'.number_format($credit,2).'</span></td>
  </tr>
 <tr>
 <td> Date </td>
 <td>'.$date.'</td>
 <tr>
</table> <p>


Thank you for choosing <span>'.$web['name'].'</span> <p>
 
<p>

</body><html>

'?>