<?php

require_once 'dao/dao.php';
//en fonction de la catégorie je récupère la liste des articles

function listArticles($cat){
    $tab_article = getArticlesByCategorie($cat);
    return $tab_article;
}