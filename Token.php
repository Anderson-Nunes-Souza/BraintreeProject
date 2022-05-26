<?php
include("./vendor/autoload.php");
session_start();

$aCustomerId = null;

$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '92qqjm3ns8njk2w3',
    'publicKey' => 'c6nb73q5tfpyy64f',
    'privateKey' => '3cc9e33a4a98464548614fd16337fe33'
]);

// pass $clientToken to your front-end
$clientToken = $gateway->clientToken()->generate([
]);

return($clientToken = $gateway->clientToken()->generate());

?>