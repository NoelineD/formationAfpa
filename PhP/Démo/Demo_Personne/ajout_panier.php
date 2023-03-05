<?php
session_start();

$codeArt = filter_input(INPUT_GET, 'art', FILTER_SANITIZE_SPECIAL_CHARS);
var_dump($codeArt);
$quantite = filter_input(INPUT_GET, 'qtt', FILTER_SANITIZE_SPECIAL_CHARS);

$panier = $_SESSION['panier'];
var_dump($panier);
if (!array_key_exists($codeArt, $panier)) {
    $artPanier = ['codeArt' => $codeArt, 'quantite' => $quantite];
    $panier[$codeArt] = $artPanier;
} else {
    $artPanier = $panier[$codeArt];
    $artPanier['quantite'] += $quantite;
    $panier[$codeArt] = $artPanier;
}
var_dump($panier);
$_SESSION['panier'] = $panier;
//var_dump($_SESSION);
header('Location: aff_panier.php');