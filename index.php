<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>
</head>

<body>
    <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>
    <form id="payment-form" action="createPayment.php" method="post">
        <!-- Putting the empty container you plan to pass to
      `braintree.dropin.create` inside a form will make layout and flow
      easier to manage -->
        <div id="dropin-container"></div>

        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce" />
    </form>

    <script type="text/javascript">
        // call `braintree.dropin.create` code here
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
                authorization: '<?php echo(require('Token.php')); ?>',
                container: '#dropin-container'
            },
            (error, dropinInstance) => {
                if (error) console.error(error);

                form.addEventListener('submit', event => {
                    event.preventDefault();

                    dropinInstance.requestPaymentMethod((error, payload) => {
                        if (error) console.error(error);

                        // Step four: when the user is ready to complete their
                        //   transaction, use the dropinInstance to get a payment
                        //   method nonce for the user's selected payment method, then add
                        //   it a the hidden field before submitting the complete form to
                        //   a server-side integration
                        document.getElementById('nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
    </script>
</body>

</html>