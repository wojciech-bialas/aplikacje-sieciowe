<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH . '/lib/smarty/Smarty.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loanAmount = $_POST['loanAmount'];
    $loanYears = $_POST['loanYears'];
    $interest = $_POST['interest'];
}

include _ROOT_PATH.'/app/security/check.php';

$smarty = new Smarty();


if ( !(isset($loanAmount) && isset($loanYears) && isset($interest)) ) {
    $errors [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if (empty($loanAmount)) {
    $errors [] = 'Nie podano kwoty!';
}

if (empty($loanYears)) {
    $errors [] = 'Nie podano okresu spłaty!';
}

if (empty($interest)) {
    $errors [] = 'Nie podano oprocentowania!';
}

if (empty($errors)) {
    $result = ( $loanAmount + $loanAmount * ($interest/100) ) / ( $loanYears*12 );

    $smarty->assign('loanAmount', $loanAmount);
    $smarty->assign('loanYears', $loanYears);
    $smarty->assign('interest', $interest);
    $smarty->assign('result', $result);
}

if ( !empty($errors)) $smarty->assign('errors', $errors);
$smarty->assign('appUrl', _APP_URL);
$smarty->assign('rootPath', _ROOT_PATH);

$smarty->display(_ROOT_PATH . '/app/calc.tpl');
