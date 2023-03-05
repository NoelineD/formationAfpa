<?php
require_once 'dao/Dao.php';

class ArticleModel {

    public function listArticle(string $cat) : array {

        $dao = new Dao();
        $tab_article = $dao->getArticlesByCategorie($cat);

        return $tab_article;
    }

}