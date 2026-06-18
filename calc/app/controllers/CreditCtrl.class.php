<?php
namespace app\controllers;

use core\App;

class CreditCtrl {

    private $errors = [];
    private $kwota = null;
    private $oprocentowanie = null;
    private $okres = null;
    private $rata = null;
    private $calkowity_koszt = null;
    private $suma_odsetek = null;

    private function validate() {
        $this->kwota        = $_GET['kwota']          ?? null;
        $this->oprocentowanie = $_GET['oprocentowanie'] ?? null;
        $this->okres        = $_GET['okres']          ?? null;

        if ($this->kwota === null || $this->oprocentowanie === null || $this->okres === null) {
            $this->errors[] = "nie podano wszystkich parametrów";
            return false;
        }

        if (!is_numeric($this->kwota) || !is_numeric($this->oprocentowanie) || !is_numeric($this->okres)) {
            $this->errors[] = "parametr nie jest liczbą";
            return false;
        }

        $this->kwota          = (float)$this->kwota;
        $this->oprocentowanie = (float)$this->oprocentowanie;
        $this->okres          = (int)$this->okres;

        if ($this->kwota <= 0)          $this->errors[] = "kwota kredytu musi być większa od zera";
        if ($this->oprocentowanie < 0)  $this->errors[] = "oprocentowanie nie może być ujemne";
        if ($this->okres <= 0)          $this->errors[] = "okres kredytowania (w miesiącach) musi być większy od zera";

        return count($this->errors) === 0;
    }

    public function action_credit() {
        // obliczenia tylko gdy formularz został wysłany
        if (!empty($_GET) && $this->validate()) {
            $r = $this->oprocentowanie / 100 / 12;

            $this->rata = ($r == 0)
            ? $this->kwota / $this->okres
            : $this->kwota * $r * pow(1+$r, $this->okres) / (pow(1+$r, $this->okres) - 1);

            $this->calkowity_koszt = $this->rata * $this->okres;
            $this->suma_odsetek    = $this->calkowity_koszt - $this->kwota;
        }

        $smarty = App::getSmarty();
        $smarty->assign('errors',             $this->errors);
        $smarty->assign('kwota_val',          $_GET['kwota']          ?? '');
        $smarty->assign('oprocentowanie_val', $_GET['oprocentowanie'] ?? '');
        $smarty->assign('okres_val',          $_GET['okres']          ?? '');
        $smarty->assign('rata',            $this->rata !== null ? number_format($this->rata, 2, ',', ' ')            : null);
        $smarty->assign('calkowity_koszt', $this->rata !== null ? number_format($this->calkowity_koszt, 2, ',', ' ') : null);
        $smarty->assign('suma_odsetek',    $this->rata !== null ? number_format($this->suma_odsetek, 2, ',', ' ')    : null);

        $smarty->display('credit.tpl');
    }
}
