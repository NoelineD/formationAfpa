<?php
namespace Dwwm\App\entities;
use Dwwm\App\dao\Dao;

class Cart {

    private $cart;

    public function getItemCart(){

        return $this->cart;
        
    }

    public function __construct(){

        if (!isset($_SESSION['cart'])) {
            // [
            //    '1' => [vin1, qtt],
            //    '2' => [vin2, qqt]
            // ]
            $cart = $this->createCart(); // récupère le panier en base si il existe
            $_SESSION['cart'] = serialize($cart);
        } 
        $this->cart = unserialize($_SESSION['cart']); 
        //print_r($this->cart);
    }

    private function createCart(): array {
        $dao = new Dao();
        $cart = $dao->getCartByIdUser($_SESSION['idUser']);
        //print_r($cart);
        if (empty($cart)) {
            return [];
        }
        $itemCarts = $dao->getAllItemCartByIdCart($cart['id_panier']);
        // $itemCarts : [
        //        ['id_vin' => 2, 'id_panier' => 4, 'quantite' => 1],
        //        ['id_vin' => 6, 'id_panier' => 4, 'quantite' => 5]
        // ]
        // doit retourner
        // [
        //    'id_vin' => [objetVin, quantite],
        //    'id_vin' => [objetVin, quantite],
        //]
        $sessionCart = [];
        foreach ($itemCarts as $item) {
            $vin = $dao->getWineById($item['id_vin']);
            $sessionCart[$item['id_vin']] = [$vin, $item['quantite']];
        }
        return $sessionCart;
    }

    public function add(Wine $wine){

        if (array_key_exists($wine->getId(), $this->cart)){
            $this->cart[$wine->getId()][1]++;
        }else {
            // mettre vin dans le panier
            $this->cart[$wine->getId()] = [$wine, 1];
        }
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function delete(Wine $wine){
        unset($this->cart[$wine->getId()]);
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function remove(Wine $wine){
        $this->cart[$wine->getId()][1]--;
        if ($this->cart[$wine->getId()][1] === 0) {
            $this->delete($wine);
        } else {
            $_SESSION['cart'] = serialize($this->cart);
        }
    }

    public function clear(){

    }

    public function prixTotal(): float {

        $prixTotal = 0.0;

        foreach($this->cart as $item){

            $prixTotal += $item[0]->getPrix_ht() * $item[1];

        }

        return $prixTotal;
    }

    public function nbrArticle(){
        return count($this->cart);
    }
}