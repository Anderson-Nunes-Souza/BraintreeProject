<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/CSS" href="./style.css">
    <title>Thank you page</title>
</head>

<body>
    <div class="cabecalho">
        <h1>Braintree Hosted Fields</h1>
    </div>
    <form id="my-sample-form">
        <h2>Thank you for your purchase!</h2>
        <h2>ID da transação: <?php echo $_SESSION["transactionID"]; ?></h2>
            <br>
            <br>
            <a href="./index.php">Voltar à página inicial</a>
    </form>
</body>

</html>