<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/hosted-fields.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/CSS" href="./style.css">
    </link>
</head>

<body>
    <div style="background-color: #4086ff; text-align: center;">
        <h1>Braintree Hosted Fields</h1>
    </div>
    <form action="createPayment.php" id="my-sample-form" method="post">

        <label for="name"> Nome completo </label>
        <div id="name" class="campoform"></div>    

        <label for="postalCode"> Postal Code</label>
        <div id="postalCode" class="campoform"></div>

        <label for="card-number">Card Number</label>
        <div id="card-number" class="campoform"></div>

        <label for="cvv">CVV</label>
        <div id="cvv" class="campoform"></div>

        <label for="expiration-date">Expiration Date</label>
        <div id="expiration-date" class="campoform"></div>
        
        <!-- <input type="hidden" id="Token"> -->
        
        <input type="submit" value="Pay" id="pButton" disabled />

        <input type="hidden" id="nonce" name="payment_method_nonce" />
        </div>
    </form>
    <script type="text/javascript" src="./hfields.js"></script>
</body>

</html>