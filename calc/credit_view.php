<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <title>Kalkulator kredytowy</title>
</head>
<body>
    <h2>Kalkulator kredytowy</h2>

    <form action="credit.php" method="GET" class="pure-form pure-form-stacked">
        <fieldset>
            <label>Kwota kredytu (PLN): </label>
            <input type="text" name="kwota" value="<?php echo isset($_GET['kwota']) ? htmlspecialchars($_GET['kwota']) : ''; ?>">

            <label>Oprocentowanie roczne (%): </label>
            <input type="text" name="oprocentowanie" value="<?php echo isset($_GET['oprocentowanie']) ? htmlspecialchars($_GET['oprocentowanie']) : ''; ?>">

            <label>Okres kredytowania (miesiące): </label>
            <input type="text" name="okres" value="<?php echo isset($_GET['okres']) ? htmlspecialchars($_GET['okres']) : ''; ?>">

            <input type="submit" value="oblicz" class="pure-button pure-button-primary">
        </fieldset>
    </form>

    <?php if(count($errors)): ?>
    <div style="padding: 10px; background-color: #FF8888; border-radius: 5px; margin-top: 10px;">
    <?php
    foreach($errors as $error){
        echo $error . "<br>";
    }
    ?>
    </div>
    <?php endif; ?>

    <?php if(isset($rata)): ?>
    <div style="padding: 10px; background-color: #88FF88; border-radius: 5px; margin-top: 10px;">
        Rata miesięczna: <?php echo number_format($rata, 2, ',', ' '); ?> PLN<br>
        Całkowity koszt kredytu: <?php echo number_format($calkowity_koszt, 2, ',', ' '); ?> PLN<br>
        Suma odsetek: <?php echo number_format($suma_odsetek, 2, ',', ' '); ?> PLN
    </div>
    <?php endif; ?>
</body>
</html>
