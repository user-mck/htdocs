<?php

$errors = array();
$kwota = null;
$oprocentowanie = null;
$okres = null;
$rata = null;
$calkowity_koszt = null;
$suma_odsetek = null;

// odebranie parametrów i walidacja
function validate(&$kwota, &$oprocentowanie, &$okres, &$errors){
    if (!isset($_GET["kwota"]) || !isset($_GET["oprocentowanie"]) || !isset($_GET["okres"])){
        $errors[] = "nie podano wszystkich parametrów";
    }

    if(count($errors)) {return false;}

    $kwota = $_GET["kwota"];
    $oprocentowanie = $_GET["oprocentowanie"];
    $okres = $_GET["okres"];

    if (!is_numeric($kwota) || !is_numeric($oprocentowanie) || !is_numeric($okres)){
        $errors[] = "parametr nie jest liczbą";
    }

    if(count($errors)) {return false;}

    $kwota = (float)$kwota;
    $oprocentowanie = (float)$oprocentowanie;
    $okres = (int)$okres;

    if ($kwota <= 0){
        $errors[] = "kwota kredytu musi być większa od zera";
    }
    if ($oprocentowanie < 0){
        $errors[] = "oprocentowanie nie może być ujemne";
    }
    if ($okres <= 0){
        $errors[] = "okres kredytowania (w miesiącach) musi być większy od zera";
    }

    if(count($errors)) {return false;}
    return true;
}

// wykonanie akcji/dzialania - obliczenie raty równej
if(validate($kwota, $oprocentowanie, $okres, $errors)) {
    $r = $oprocentowanie / 100 / 12; // miesięczna stopa procentowa

    if ($r == 0){
        $rata = $kwota / $okres;
    } else {
        $rata = $kwota * $r * pow(1 + $r, $okres) / (pow(1 + $r, $okres) - 1);
    }

    $calkowity_koszt = $rata * $okres;
    $suma_odsetek = $calkowity_koszt - $kwota;
}

// wygenerowanie odpowiedzi
include "index.php";
