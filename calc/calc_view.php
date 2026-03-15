<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <title>Calculator</title>
</head>
<body>
    <form action="calc.php" method="GET" class="pure-form">
        <label>wartość x: </label>
        <input type="text" name="x">

        <label>wartość y: </label>
        <input type="text" name="y">

        <input type="submit" value="oblicz" class="pure-button pure-button-primary">
    </form>

    <div style="padding: 10px; background-color: FF8888; border-radius: 5px;">
    <?php
    foreach($errors as $error){
        echo $error . "<br>";
    }
    ?>
    </div>

    <div style="padding: 10px; background-color: 88FF88; border-radius: 5px;">
    <?php
    if(isset($wynik)){
        echo "Wynik: ".$wynik;
    }
    ?>
    </div>
</body>
</html>