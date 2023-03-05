<?php

class panierControleur {

    public function execute($action) {

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
                header('Location: index.php?entite=article&action=list&choix_cat=' . $categorie);
                exit();
                break;

            case 'voir':
                require_once 'dao/dao.php';
                $dao = new Dao();
                $panier = $_SESSION['panier'];
                $articlePanier = [];
                foreach ($panier as $codeArt => $qtt) {
                    $article = $dao->getArticleByCode($codeArt);
                    $article['qtt_art'] = $qtt;
                    //var_dump($article);
                    $articlePanier[] = $article;
                }
                $param = ['articlePanier' => $articlePanier];
                $this->creerVue('panier/list_panier', $param);
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
