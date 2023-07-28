<?php 
require('./Token.php');
include("./vendor/autoload.php");


$nonceFromTheClient = $_POST["payment_method_nonce"];
//$deviceDataFromTheClient = $_POST["data_collector"];

//Use payment method nonce here
$result = $gateway->transaction()->sale([
    'amount' => '25.00',
    'paymentMethodNonce' => $nonceFromTheClient,
    //'deviceData' => $deviceDataFromTheClient,
    'options' => [
      'submitForSettlement' => True
    ]
  ]);
  
  //print($result);
  //print(gettype($result));
  //echo($result->success); //true
  //echo($result->transaction); //Exibe todos os dados da transação
  //$result->transaction->id; //Retorna o ID da transação

  require('./Thankyou.php?transactionID='+ "123"+ $result->transaction->id);
?>