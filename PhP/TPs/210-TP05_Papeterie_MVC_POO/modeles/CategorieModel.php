<?php
require_once 'dao/Dao.php';

class CategorieModel {

    public function listCategorie() : array {

        $dao = new Dao();
        $tab_cat = $dao->getAllCategorie();

        return $tab_cat;
    }

}