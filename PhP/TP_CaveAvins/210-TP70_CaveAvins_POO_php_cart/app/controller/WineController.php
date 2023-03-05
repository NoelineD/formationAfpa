<?php
namespace Dwwm\App\controller;

use Dwwm\App\model\WineModel;
use Dwwm\App\dao\Dao;
use Dwwm\App\entities\Cart;

class WineController extends Controller {

    public function list(){
        $model = new WineModel();
        $tabWines = $model->listWine();
        $cart = new Cart();
        $nbrWine = $cart->nbrArticle();
        $view = 'wine/listWine';
        $paramView = ['css' => 'caveavins', 'wines' => $tabWines, 'nbrWine' => $nbrWine];
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

    public function see(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $model = new WineModel();
        $vin = $model->seeWine($id);

        $view = 'wine/seeWine';
        $paramView = ['vin' => $vin, 'error' => ''];
        $this->createView($view, $paramView);
    }

    public function delete(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $model = new WineModel();
        $vin = $model->deleteWine($id);
        header('Location: index.php?entite=wine&action=list');
        exit();
    }

    public function update(){

        // print_r($_POST);
        // print_r($_FILES);
        // die();
        $model = new WineModel();
        $model->updateWine();
        header('Location: index.php?entite=wine&action=list');
        exit();
    }

    public function addtocart(){

        $cart = new Cart();
     
        $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
        $dao = new Dao();
        $wine = $dao->getWineById($idVin);
    
        $cart->add($wine);
    
        header('Location: index.php?entite=wine&action=list');
        exit();
    
    }
    
}