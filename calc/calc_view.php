<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Calculator</title>
</head>
<body>
    <form action="GET">
        <label for="">wartość x: </label>
        <input type="text" name="x">

        <label for="">wartość y: </label>
        <input type="text" name="y">

        <input type="submit" value="oblicz">
    </form>

    <?php
    foreach($errors as $error){
        echo $error;
        echo <br>;
    }
    ?>
</body>
</html>