<?php

include_once 'dao/dao.php';

function listCategories(){

$tab_cat = getAllCategorie();
return $tab_cat;
}