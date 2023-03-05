<?php

session_start();

$codeArt = filter_input(INPUT_GET,'art', FILTER_SANITIZE_SPECIAL_CHARS);
$quantite = filter_input(INPUT_GET,'qtt', FILTER_SANITIZE_SPECIAL_CHARS);
$panier= $_SESSION['panier'];
//var_dump($panier);

//si la clé n'existe pas ajoute la au panier avec la quantité, si elle existe ajoute a cet article la quantité
if (!array_key_exists($codeArt,$panier)){
    $artPanier =['codeArt'=> $codeArt, 'quantite' => $quantite];
    $panier[$codeArt]=$artPanier;
} else {
    $artPanier = $panier[$codeArt]; 
    $artPanier['quantite'] += $quantite; // ajoute les quantité à chaque fois qu'on ajoute
    $panier [$codeArt] = $artPanier;
}

var_dump($panier);
$_SESSION['panier']= $panier;
// var_dump($_SESSION);
 header('Location: liste_article.php');
//faire page panier