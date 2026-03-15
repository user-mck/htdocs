<?php

$errors = array();
$x = null;
$y = null;
$wynik = null;

// odebranie parametrów i walidacja
function validate(&$x,&$y,&$errors){
    if (!isset($_GET["x"]) || !isset($_GET["y"])){
        $errors[] = "nie podano parametrów";   
    }

    if(count($errors)) {return false;}

    $x = $_GET["x"];
    $y = $_GET["y"];

    if (!is_numeric($x) || !is_numeric($y)){
        $errors[] = "parametr nie jest liczbą";
    }
    
    $x = (float)$x;
    $y = (float)$y;

    if(count($errors)) {return false;}
    return true;
}

// wykonanie akcji/dzialania
if(validate($x,$y,$errors)) {
    $wynik = $x * $y;
}

// wygenerowanie odpowiedzi
include "calc_view.php";