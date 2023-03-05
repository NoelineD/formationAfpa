<?php

require_once 'dao/dao.php';

function listArticle($cat){

    $tab_article = getArticlesByCategorie($cat);

    return $tab_article;
}