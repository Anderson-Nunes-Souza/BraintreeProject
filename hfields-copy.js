var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="submit"]');
var threeDSecure;

var threeDSecureParameters = {
    amount: '500.00',
    email: 'test@example.com',
    billingAddress: {
      givenName: 'Jill', // ASCII-printable characters required, else will throw a validation error
      surname: 'Doe', // ASCII-printable characters required, else will throw a validation error
      phoneNumber: '8101234567',
      streetAddress: '555 Smith St.',
      extendedAddress: '#5',
      locality: 'Oakland',
      region: 'CA', // ISO-3166-2 code
      postalCode: '12345',
      countryCodeAlpha2: 'US'
    },
    collectDeviceData: true,
    additionalInformation: {
      workPhoneNumber: '8101234567',
      shippingGivenName: 'Jill',
      shippingSurname: 'Doe',
      shippingPhone: '8101234567',
      shippingAddress: {
        streetAddress: '555 Smith St.',
        extendedAddress: '#5',
        locality: 'Oakland',
        region: 'CA', // ISO-3166-2 code
        postalCode: '12345',
        countryCodeAlpha2: 'US'
      }
    },
  };

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
        threeDSecure: true
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
                    //payload.nonce = "./createPayment.php?payment_method_nonce?" + payload.nonce;
                    document.getElementById("nonce").value = payload.nonce;
                    console.log("Datatype payload: " + typeof(payload));
                    console.table(payload);
                    form.submit();
                });
            }, false);
        });
    });
}