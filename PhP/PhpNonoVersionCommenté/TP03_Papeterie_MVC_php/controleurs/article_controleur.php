<?php

switch ($action){
    case 'list':

        include 'modeles/categorie_modele.php';
        $categories = listCategories();
        $choix=filter_input(INPUT_GET, 'choix_cat');
        if(!$choix){
            $choix = $categories[0]['libelle_cat'];
        }
        include 'modeles/article_modele.php';
        $articles = listArticles($choix); //recuperer tableau des articles
        $vue ='article/list_article';
        break;
    
    default:

        break;
}
?>