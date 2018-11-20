<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pay for something</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        label {
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2 class="header">Pay for something</h2>

        <form action="checkout.php" method="post" autocomplete="off">
            <label for="item">
                Product
                <input type="text" name="product">
            </label><br>
            <label for="amount">
                Price
                <input type="text" name="price">
            </label>
            <br><input type="submit" value="Pay">
        </form>

        <p>You'll be taken to PayPal to complete your payment.</p>
    </div>
</body>
</html>