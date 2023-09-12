<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Thank you page</title>
</head>

<body>
<div id="cabecalho">
        <h1>Braintree Hosted Fields</h1>
    </div>
    <div id="bthankyou">

        <h1>Thank you for your purchase!</h1>
        <img id="sucessfulimg" src="./assets/sucessful.png" alt="sucessful purchase">
        <h1>ID da transação: 
            <?php 
        $transaction_id = $_SESSION["transactionID"];
        echo $transaction_id;
        ?></h>
    <br>
    <br>
    <a href="./index.php">Voltar à página inicial</a>
</div>
</body>
<footer id="rodape">
    PayPal©
    <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>

</html>