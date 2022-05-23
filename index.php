<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
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
    </form>

    <script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.85.3/js/hosted-fields.min.js"></script>
    <script>
        var form = document.querySelector('#my-sample-form');
        var submit = document.querySelector('input[type="submit"]');

        braintree.client.create({
            authorization: '<?php echo (require('Token.php')) ?>'
        }, function(clientErr, clientInstance) {
            if (clientErr) {
                console.error(clientErr);
                return;
            }

            // This example shows Hosted Fields, but you can also use this
            // client instance to create additional components here, such as
            // PayPal or Data Collector.

            braintree.hostedFields.create({
                client: clientInstance,
                styles: {
                    'input': {
                        'font-size': '14px'
                    },
                    'input.invalid': {
                        'color': 'red'
                    },
                    'input.valid': {
                        'color': 'green'
                    }
                },
                fields: {
                    number: {
                        container: '#card-number',
                        placeholder: '4111 1111 1111 1111',
                        border: '1px solid #333'
                    },
                    cvv: {
                        container: '#cvv',
                        placeholder: '123'
                    },
                    expirationDate: {
                        container: '#expiration-date',
                        placeholder: '10/2022'
                    }
                }
            }, function(hostedFieldsErr, hostedFieldsInstance) {
                if (hostedFieldsErr) {
                    console.error(hostedFieldsErr);
                    return;
                }

                submit.removeAttribute('disabled');

                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    hostedFieldsInstance.tokenize(function(tokenizeErr, payload) {
                        if (tokenizeErr) {
                            console.error(tokenizeErr);
                            return;
                        }

                        // If this was a real integration, this is where you would
                        // send the nonce to your server.
                        console.log('Got a nonce: ' + payload.nonce);
                    });
                }, false);
            });
        });
    </script>
</body>

</html>