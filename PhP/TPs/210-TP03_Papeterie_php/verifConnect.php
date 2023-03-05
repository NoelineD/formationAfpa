<?php
session_start();

//var_dump($_POST);

if ($_POST['psw'] == 'psw') {
    $_SESSION['login'] = $_POST['ident'];
    header('Location: index.php');
} else {
    header('Location: connect.php');
}

