<?php
include 'app/model/wineModel.php';

switch ($action) {
    case 'list':
        $wines = listWine();
        $vue = 'wine/listWine';
        break;
    
    default:
        # code...
        break;
}