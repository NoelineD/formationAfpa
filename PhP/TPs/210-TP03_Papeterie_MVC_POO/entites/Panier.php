<?php

class Panier {

    private  array $articles = [];

    public function addArticle(string $codeArticle, int $quantite){

        if (array_key_exists($codeArticle, $this->articles)) {
            $this->articles[$codeArticle] += $quantite;
        } else {
            $this->articles[$codeArticle] = $quantite;
        }
    }

    public function viderPanier(){
        $this->articles = [];
    }

    public function removeArticle(string $codeArticle){

        unset($this->articles[$codeArticle]);
    }

    public function nbrArticle(){
        return count($this->articles);
    }

    // getteurs
    public function getArticles(){
        return $this->articles;
    }
}