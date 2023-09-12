var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="submit"]');
var threeDSecure;

function verifyCard(payload) {
    console.table(payload);
    var threeDSecureParameters = {
        amount: '500.00',
        nonce: payload.nonce, // Example: hostedFieldsTokenizationPayload.nonce
        bin: payload.details.bin, // Example: hostedFieldsTokenizationPayload.details.bin
        email: 'test@example.com',
        collectDeviceData: true,
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
        onLookupComplete: function (data, next) {
            // use 'data' here, then call 'next()'
            console.table(`${data}: verify card data`);
            next();
        }
    };

    threeDSecure.verifyCard(threeDSecureParameters, function (err, response) {
        if (err) {
            alert(`Erro no verifyCard: ${err}`)
            //console.log(err);
            return;
        }
        console.log(response.threeDSecureInfo.threeDSecureAuthenticationId)
        //console.log(response);
        console.log("response.nonce" + response.nonce);
        //makePayment(response.nonce);
        //next();
        // Send response.nonce to your server for use in your integration
        // The 3D Secure Authentication ID can be found
        //  at response.threeDSecureInfo.threeDSecureAuthenticationId
        $.ajax({
            type: "POST",
            url: "createPayment.php",
            data: {
                'nonce': response.nonce
            },
            success: function (result) {
                document.write(result)
            },
            error: function (error) {
                alert(error);
            }
        })
    });
}

function CriarBraintree(Token) {
    braintree.client.create({
        authorization: Token,
    }, function (clientErr, clientInstance) {
        if (clientErr) {
            console.error(clientErr);
            return;
        }

        braintree.threeDSecure.create({
            version: 2, // Will use 3DS2 whenever possible
            client: clientInstance
        }, function (threeDSecureErr, threeDSecureInstance) {
            if (threeDSecureErr) {
                console.log(threeDSecureErr);
                // Handle error in 3D Secure component creation
                return;
            }
            console.table(clientInstance)
            console.log(typeof (clientInstance))
            console.table(clientInstance._configuration)
            threeDSecure = threeDSecureInstance;

        });

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
                },
                cvv: {
                    container: '#cvv',
                    placeholder: '123'
                },
                // expirationDate: {
                //     container: '#expiration-date',
                //     placeholder: '10/2022'
                // }
            }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
            if (hostedFieldsErr) {
                console.error(hostedFieldsErr);
                return;
            }

            submit.removeAttribute('disabled');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                    if (tokenizeErr) {
                        console.error(tokenizeErr);
                        return;
                    }
                    // If this was a real integration, this is where you would
                    // send the nonce to your server.
                    //console.log(payload.details.bin) retornou o BIN
                    console.log("payload antes de chamar o verifyCard" + payload.nonce)
                    verifyCard(payload);
                    console.log('Got a nonce: ' + payload.nonce);
                    document.getElementById("nonce").value = payload.nonce;
                    console.log("Datatype payload: " + typeof (payload));
                    console.table(payload);
                    
                    //form.submit();
                });
            }, false);
        });
    });
}

$.ajax({
    type: "GET",
    url: "Token.php",
    success: function (result) {
        //console.log(result);
        CriarBraintree(result);
    },
    error: function (error) {
        alert(error);
    }
});