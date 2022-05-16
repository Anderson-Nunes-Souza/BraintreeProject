<?php 
require('./Token.php');
include("./vendor/autoload.php");

$nonceFromTheClient = $_POST["payment_method_nonce"];
//$deviceDataFromTheClient = $_POST["data_collector"];

//Use payment method nonce here
$result = $gateway->transaction()->sale([
    'amount' => '25.00',
    'paymentMethodNonce' => $nonceFromTheClient,
    'deviceData' => $deviceDataFromTheClient,
    'options' => [
      'submitForSettlement' => True
    ]
  ]);
  
  require('./Thankyou.php');
?>