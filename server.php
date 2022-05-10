<?php
include("./vendor/autoload.php");
$aCustomerId = null;

$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '92qqjm3ns8njk2w3',
    'publicKey' => 'c6nb73q5tfpyy64f',
    'privateKey' => '3cc9e33a4a98464548614fd16337fe33'
]);

// pass $clientToken to your front-end
$clientToken = $gateway->clientToken()->generate([
    "customerId" => $aCustomerId
]);

echo($clientToken = $gateway->clientToken()->generate());

/*$nonceFromTheClient = $_POST["payment_method_nonce"];

//Use payment method nonce here
$result = $gateway->transaction()->sale([
    'amount' => '10.00',
    'paymentMethodNonce' => $nonceFromTheClient,
    'deviceData' => $deviceDataFromTheClient,
    'options' => [
      'submitForSettlement' => True
    ]
  ]);*/
