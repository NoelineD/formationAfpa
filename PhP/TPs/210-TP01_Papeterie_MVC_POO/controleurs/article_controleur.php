<?php
include 'modeles/CategorieModel.php';
include 'modeles/ArticleModel.php';

switch ($action) {
    case 'list':
        $modCateg = new CategorieModel();
        $categories = $modCateg->listCategorie();
        $choix = filter_input(INPUT_GET, 'choix_cat');
        if (!$choix) {
           $choix = $categories[0]['libelle_cat'];
        }
        $modArticle = new ArticleModel();
        $articles = $modArticle->listArticle($choix);
        $vue = 'article/list_article';
        break;
    
    default:
        # code...
        break;
}