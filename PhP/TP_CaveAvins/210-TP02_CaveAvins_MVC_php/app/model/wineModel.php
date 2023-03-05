<?php
require 'app/dao/dao.php';

function listWine(){

    $tabWine = getAllWine();
    return $tabWine;

}