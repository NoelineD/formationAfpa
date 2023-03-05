<?php

include 'modeles/CategorieModel.php';
include 'modeles/ArticleModel.php';

class ArticleControleur {

    public function execute($action) {

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
                
                $param = ['choix' => $choix, 'categories' => $categories, 'articles' => $articles];
                $this->creerVue('article/list_article', $param);
                break;

            default:
                # code...
                break;
        }
    }
    
    public function creerVue($vue, $param = []) {
        
        extract($param);
        
        include './vues/template.php';
    }

}
