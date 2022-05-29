<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/hosted-fields.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>

<body>
    <div style="background-color: #4086ff; text-align: center;">
        <h1>Braintree Hosted Fields</h1>
    </div>
    <form action="createPayment.php" id="my-sample-form" method="post">
        <label for="card-number">Card Number</label>
        <div id="card-number"></div>

        <label for="cvv">CVV</label>
        <div id="cvv"></div>

        <label for="expiration-date">Expiration Date</label>
        <div id="expiration-date"></div>

        <input type="submit" value="Pay" disabled />
        <input type="hidden" id="nonce" name="payment_method_nonce"/>

        <input type="hidden" id="Token">
    </form>
    <script type="text/javascript" src="./hfields.js"></script>
</body>

</html>