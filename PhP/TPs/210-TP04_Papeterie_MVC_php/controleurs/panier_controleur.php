<?php

switch ($action) {
    case 'ajout':
        $categorie = filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS);
        $codeArt = filter_input(INPUT_POST, 'code_art', FILTER_SANITIZE_NUMBER_INT);
        $quantite = filter_input(INPUT_POST, 'quantite', FILTER_SANITIZE_NUMBER_INT);

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        $panier = $_SESSION['panier'];

        if (array_key_exists($codeArt, $panier)) {
            // article existant : modification de lq quanite
            $panier[$codeArt] = $panier[$codeArt] + $quantite;
        } else {
            //article inexistant : ajout dans le panier
            $panier[$codeArt] = $quantite;
        }
        $_SESSION['panier'] = $panier;
        header('Location: index.php?entite=article&action=list&choix_cat='.$categorie);
        exit();
        break;
    
    default:
        # code...
        break;
}