<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>
</head>

<body>
    <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>

    <script type="text/javascript">
        // call `braintree.dropin.create` code here
        // Step two: create a dropin instance using that container (or a string
        //that functions as a query selector such as `#dropin-container`)
        braintree.dropin.create({
            container: document.getElementById('dropin-container'),
            authorization: CLIENT_TOKEN_FROM_SERVER,
            container: '#dropin-container'
            // ...plus remaining configuration
        }, (error, dropinInstance) => {
            // Use `dropinInstance` here
            // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        });
    </script>
</body>

</html>