<?php
session_start();

//var_dump($_POST);

$psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
$ident = filter_input(INPUT_POST, 'ident', FILTER_SANITIZE_SPECIAL_CHARS);

var_dump($_POST['psw']);
var_dump($psw);
die();

if ($psw == 'psw') {
    $_SESSION['login'] = $ident;
    header('Location: index.php');
} else {
    header('Location: connect.php');
}

