<?php

require_once 'dao/dao.php';

function listCategorie(){

    $tab_cat = getAllCategorie();

    return $tab_cat;
}