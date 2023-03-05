<?php
require 'app/dao/Dao.php';
require_once 'app/entities/Wine.php';

class WineModel {

    public function listWine(){

        $dao = new Dao();
        $tabWine = $dao->getAllWine();
        return $tabWine;

    }

    public function seeWine(int $id){
        $dao = new Dao();
        $wine = $dao->getWineById($id);
        return $wine;
    }

    public function deleteWine(int $id){
        $dao = new Dao();
        $dao->deleteWineById($id);
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

        $vin = new Wine($region, $cepage, $millesime, $robe, $nom, $filename, $prix);

        $dao->setWine($vin);
    }

}