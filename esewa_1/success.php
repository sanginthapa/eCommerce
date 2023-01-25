<?php
include "esewa_controller.php";

//  $oid = $_GET['oid'];
//  $amt = $_GET['amt'];
 $refId = $_GET['refId'];

//  echo '<br>';
//  echo "Order Id :".$oid . '<br>';
//  echo "Amount :".$amt . '<br>';
//  echo "Refrence ID :".$refId . '<br>';


//  verification
$data =[
    'amt'=> $actualAmt,
    'rid'=> $refId,
    'pid'=> $pid,
    'scd'=> $merchant_code
];

    $curl = curl_init($fraudCheckUrl);// taken from esewa_controller.php
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    if (strpos($response,"Success") !== false) {
   header("location:https://ultimanepal.com/");
}else{
     header("location:https://ultimanepal.com/login.php"); 
}
 ?>