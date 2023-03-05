<?php

include 'modeles/CategorieModel.php';
include 'modeles/ArticleModel.php';

/**
 * contrôleur secondaire pour les articles
 */
class ArticleControleur {

    /**
     * méthode exécutant l'action demandée par le controleur
     *
     * @param string $action
     * @return void
     */
    public function execute(string $action) : void {

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
    
    /**
     * méthode qui rend la page html
     *
     * @param string $vue
     * @param array $param tableau des paramètres nécessaires à la vue
     * @return void
     */
    public function creerVue(string $vue, array $param = []) : void {
        
        extract($param);
        
        include './vues/template.php';
    }

}
