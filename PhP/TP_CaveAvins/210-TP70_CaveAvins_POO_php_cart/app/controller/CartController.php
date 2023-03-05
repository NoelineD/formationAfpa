<?php
namespace Dwwm\App\controller;

use Dwwm\App\dao\Dao;
use Dwwm\App\entities\Cart;

class CartController extends Controller {

//     public function add(){

//         $cart = unserialize($_SESSION['cart']);

//         $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//         // vérifier que $idVin est bien un int et un booleen false

        
//         if (array_key_exists($idVin, $cart)){
//             // incrémenter la quantite
//             $itemCart = $cart[$idVin][1]++;
//         } else {
//             // mettre vin dans le panier
//             // récupérer le vin
//             $dao = new Dao();
//             $wine = $dao->getWineById($idVin);
//             $cart[$idVin] = [$wine, 1];
//         }
//         $_SESSION['cart'] = serialize($cart);
//         header('Location: index.php?entite=wine&action=list');
//         exit();
//     }

public function add(){

    $cart = new Cart();
 
    $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $dao = new Dao();
    $wine = $dao->getWineById($idVin);

    $cart->add($wine);

    header('Location: index.php?entite=cart&action=show');
    exit();

}

public function remove(){

    $cart = new Cart();
 
    $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $dao = new Dao();
    $wine = $dao->getWineById($idVin);

    $cart->remove($wine);

    header('Location: index.php?entite=cart&action=show');
    exit();

}

public function show(){ 
    // test des méthodes du cart de la Dao
    // $dao = new Dao();
    // $cart = $dao->getCartByIdUser($_SESSION['idUser']);
    // var_dump($cart);
    // echo '<br>';
    // $itemCarts = $dao->getAllItemCartByIdCart($cart['id_panier']);
    // var_dump($itemCarts);

    $cart = new Cart();

    $itemCarts = $cart->getItemCart();
    $prixHT = $cart->prixTotal();

    $view = 'cart/showCart';
    $paramView = ['itemCarts' => $itemCarts, 'prixHt' => $prixHT];
    $this->createView($view, $paramView);
}

public function save(){

    $cart = new Cart();
    $itemCarts = $cart->getItemCart();

    $dao = new Dao();
    $idCart = $dao->newCart();

    foreach ($itemCarts as $item) {
        $dao->addItemCart($idCart, $item[0]->getId(), $item[1]);
    }

    $this->show();
}

}