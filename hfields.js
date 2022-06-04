var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="submit"]');

$.ajax({
    type: "GET",
    url: "Token.php",
    success: function(result) {
        //console.log(result);
        CriarBraintree(result);
    },
    error: function(error) {
        alert(error);
    }
});

//console.log(Token);

function CriarBraintree(Token) {
    braintree.client.create({
        authorization: Token,
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
            fields: {
                cardholderName: {
                    container: '#name',
                    placeholder: 'Nome Sobrenome1 e Sobrenome2'
                },
                number: {
                    container: '#card-number',
                    placeholder: '4111 1111 1111 1111',
                },
                cvv: {
                    container: '#cvv',
                    placeholder: '123'
                },
                expirationDate: {
                    container: '#expiration-date',
                    placeholder: '10/2022'
                },
                postalCode: {
                    container: '#postalCode',
                    placeholder: '12345-678'
                }
            },
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
                    document.getElementById("nonce").value = payload.nonce;
                    console.log("Datatype payload: " + typeof(payload));
                    console.table(payload);
                    form.submit();
                });
            }, false);
        });
    });
}