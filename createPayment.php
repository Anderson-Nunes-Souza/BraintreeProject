<?php

use function PHPSTORM_META\type;

require('./Token.php');
include("./vendor/autoload.php");
ob_clean(); 


$nonceFromTheClient = $_POST['nonce']; 
//echo(gettype($nonceFromTheClient));
//echo("nonce recebido: {$nonceFromTheClient}");
//echo nl2br("nonce recebido no CreatePayment\n" . $nonceFromTheClient. "\n");
//print('Payload Nonce createPayment'. $nonceFromTheClient);
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
  
  // //print nl2br($result);
  // //print(gettype($result));
  // //echo($result->success); //true
  // //echo($result->transaction); //Exibe todos os dados da transação
  // //$result->transaction->id; //Retorna o ID da transação

  $_SESSION["transactionID"]= $result->transaction->id;

  require('./Thankyou.php');
?>