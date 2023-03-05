<?php
include 'app/model/wineModel.php';


class WineController {

    public function createView(string $vue, array $params){

        extract($params); // creation des variables nécessaires à la vue
        
        include 'app/view/template.php';
    }

    public function execute(string $action){
        // switch ($action) {
        //     case 'list':
        //         $this->list();
        //         break;
        //     case 'create':
        //         $this->create();
        //         break;
        // }

        $this->$action();   // appel la méthode dont le nom est dans la variable $action
    }

    public function list(){
        $model = new WineModel();
        $tabWines = $model->listWine();
        $view = 'wine/listWine';
        $paramView = ['wines' => $tabWines];
        $this->createView($view, $paramView);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // envoi du formulaire
            $view = 'wine/createWine';
            //$error = '';
            $paramView = ['error' => ''];
            $this->createView($view, $paramView);
           
        } else {
            // traitement des informations
            //print_r($_POST);
            //print_r($_FILES);
            $filename = 'vins/' . $_FILES['image']['name'];
            if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
                $model = new WineModel();
                $model->createWine();
            }
            header('Location: index.php?entite=wine&action=list');
            exit();
        }

    }

}