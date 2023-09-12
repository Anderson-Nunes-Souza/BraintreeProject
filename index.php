<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/hosted-fields.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Load the client component. -->
    <script src="https://js.braintreegateway.com/web/3.97.1/js/client.min.js"></script>
    <!-- Load the 3D Secure component. -->
    <script src="https://js.braintreegateway.com/web/3.97.1/js/three-d-secure.min.js"></script>

    <!-- Load the Hosted Fields component. -->
    <script src="https://js.braintreegateway.com/web/3.97.1/js/hosted-fields.min.js"></script>
</head>

<body>
    <div id="cabecalho">
        <h1>Braintree Hosted Fields</h1>
    </div>
    <form action="createPayment.php" id="my-sample-form" method="post">
        
    <label for="card-number">Card Number</label>
        <div id="card-number"></div>

        <label for="cvv">CVV</label>
        <div id="cvv"></div>

        <!-- <label for="expiration-date">Expiration Date</label>
        <div id="expiration-date"></div> -->

            <input id="submit_button" type="submit" value="Pay" disabled />
        
        <input type="hidden" id="nonce" name="payment_method_nonce" />
        <!--input type="hidden" id="" name="data_collector"-->

        <input type="hidden" id="Token">
    </form>
    <script type="text/javascript" src="./hfields.js"></script>

    <footer id="rodape">
    PayPal©
    <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>
 </footer>

</body>


</html>