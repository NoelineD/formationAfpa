<?php
include 'app/model/wineModel.php';

switch ($action) {
    case 'list':
        $wines = listWine();
        $vue = 'wine/listWine';
        break;
    
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // envoi du formulaire
            $vue = 'wine/createWine';
            $error = '';
        } else {
            // traitement des informations
            //print_r($_POST);
            //print_r($_FILES);
            $filename = 'vins/' . $_FILES['image']['name'];
            if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
                createWine();
            }
            header('Location: index.php?entite=wine&action=list');
            exit();
        }
        
        break;

    default:
        # code...
        break;
}