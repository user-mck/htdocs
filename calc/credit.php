<?php
use Smarty\Smarty;

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

// blok smarty
require_once __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates/');
$smarty->setCompileDir(__DIR__ . '/templates_c/');

$smarty->assign('errors',             $errors);
$smarty->assign('kwota_val',          $_GET['kwota']          ?? '');
$smarty->assign('oprocentowanie_val', $_GET['oprocentowanie'] ?? '');
$smarty->assign('okres_val',          $_GET['okres']          ?? '');
$smarty->assign('rata',               $rata !== null ? number_format($rata, 2, ',', ' ') : null);
$smarty->assign('calkowity_koszt',    $rata !== null ? number_format($calkowity_koszt, 2, ',', ' ') : null);
$smarty->assign('suma_odsetek',       $rata !== null ? number_format($suma_odsetek, 2, ',', ' ')    : null);

$smarty->display('credit.tpl');  //
