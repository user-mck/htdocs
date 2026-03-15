<?php

$errors = array();
$x = null;
$y = null;

function validate(){
    
}

// odebranie parametrów i walidacja
if (!isset($_GET["x"]) && !isset($_GET["y"])){
 $errors[] = "nie podano parametrów";   
}

$x = $_GET["x"];
$y = $_GET["y"];

if (!is_numeric($x)|| !is_numeric($y)){
    $errors[] = "parametr nie jest liczbą";
}

// wykonanie akcji/dzialania

// wygenerowanie odpowiedzi
include "calc_view.php";