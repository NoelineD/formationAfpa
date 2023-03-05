<?php
require 'app/dao/dao.php';

class WineModel {

    public function listWine(){

        $dao = new Dao();
        $tabWine = $dao->getAllWine();
        return $tabWine;

    }

    public function createWine(){

        $dao = new Dao();
        $region = filter_input(INPUT_POST, 'region', FILTER_SANITIZE_SPECIAL_CHARS);
        $cepage = filter_input(INPUT_POST, 'cepage', FILTER_SANITIZE_SPECIAL_CHARS);
        $robe = filter_input(INPUT_POST, 'robe', FILTER_SANITIZE_SPECIAL_CHARS);
        $millesime = filter_input(INPUT_POST, 'millesime', FILTER_SANITIZE_SPECIAL_CHARS);
        $prix = filter_input(INPUT_POST, 'prix', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $filename = $_FILES['image']['name'];

        $dao->setWine($region, $cepage, $robe, $nom, $millesime, $prix, $filename);
    }

}