<?php
namespace Dwwm\App\dao;

use PDO;
use PDOException;
use Exception;
use Dwwm\App\entities\Wine;
use Dwwm\App\entities\User;

class Dao {

    private ?PDO $dbconnect;

    public function __construct()
    {
         try{
            $this->dbconnect = new PDO('mysql:host=localhost;dbname=caveavin;charset=UTF8', 'root', '');
        } catch(PDOException $pdoExcept){
            //var_dump($pdoExcept->getMessage()); die();
            throw new Exception('Application non disponible actuellement');
        }
    }

    public function getAllWine() : array {

        $sql = 'SELECT * FROM vin';
        $vin_statement = $this->dbconnect->query($sql);
        $vin_statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Dwwm\App\entities\Wine');
        $vins = $vin_statement->fetchAll();
        return $vins;
        
    }

    public function getWineById(int $idVin) : Wine {
        $sql = 'SELECT * FROM vin WHERE id=:id';
        $vin_statement = $this->dbconnect->prepare($sql);
        $vin_statement->bindParam(':id', $idVin);
        $vin_statement->execute();
        $vin_statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Dwwm\App\entities\Wine');
        $vin = $vin_statement->fetch();
        return $vin;

    }

    public function setWine(Wine $wine){

        $sql = 'INSERT INTO vin  VALUES (NULL, :reg, :cep, :mil, :rob, :nom, :file, :date, :prix)';
        $wine_statement = $this->dbconnect->prepare($sql);
        // $wine_statement->bindParam('reg', $reg);
        // $wine_statement->bindParam('cep', $cep);
        // $wine_statement->bindParam('mil', $mil);
        // $wine_statement->bindParam('rob', $rob);
        // $wine_statement->bindParam('nom', $name);
        // $wine_statement->bindParam('file', $filename);
        // $wine_statement->bindParam('prix', $prix);

        $param = [
            ':reg' => $wine->getRegion(),
            ':cep' => $wine->getCepage(),
            ':mil' => $wine->getMilesime(),
            ':rob' => $wine->getRegion(),
            ':nom' => $wine->getNom(),
            ':file' => $wine->getImage_name(),
            ':prix' => $wine->getPrix_ht(),
            ':date' => $wine->getUpdate_at()
        ];

        $wine_statement->execute($param);
    }

    public function deleteWineById(int $idVin){

        $sql = 'DELETE FROM vin WHERE id=:id';
        $vin_statement = $this->dbconnect->prepare($sql);
        $vin_statement->bindParam(':id', $idVin);
        $vin_statement->execute();
    }

    public function getCartByIdUser(int $idUser): array{

        $sql = 'SELECT * FROM panier WHERE id_user=' . $idUser;
        $cartStat = $this->dbconnect->query($sql);
        if ($cartStat->rowCount() == 1) {
            $cart = $cartStat->fetch(PDO::FETCH_ASSOC);
            return $cart;
        } else {
            return [];
        }
    }

    public function getAllItemCartByIdCart(int $idCart): array {

        $sql = 'SELECT * FROM item_panier WHERE id_panier=' . $idCart;
        $itemCartStat = $this->dbconnect->query($sql);
        $itemCarts = $itemCartStat->fetchAll(PDO::FETCH_ASSOC);
        return $itemCarts;
    }

    public function getUserByLogin(string $login) : User {

        $sql = 'SELECT * FROM user WHERE email=:login;';

        $userStat = $this->dbconnect->prepare($sql);
        $userStat->bindParam('login', $login);
        $userStat->execute();

        if ($userStat->rowCount() == 1) {
            $userStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Dwwm\App\entities\User');
            $user = $userStat->fetch();
            $userStat = NULL;
            $this->dbconnect = NULL;
            return $user;
        } else {
            $userStat = NULL;
            $this->dbconnect = NULL;
            throw new Exception('User non trouvé en base');
        }

    }

    public function updateWine(Wine $wine, int $idWine){

        $sql = 'UPDATE `vin` SET `region`=:reg,`cepage`=:cep,`milesime`=:mil,`robe`=:rob,`nom`=:nom,`image_name`=:file,`update_at`=:date,`prix_ht`=:prix WHERE id=' . $idWine;

        $wine_statement = $this->dbconnect->prepare($sql);
        $param = [
            ':reg' => $wine->getRegion(),
            ':cep' => $wine->getCepage(),
            ':mil' => $wine->getMilesime(),
            ':rob' => $wine->getRegion(),
            ':nom' => $wine->getNom(),
            ':file' => $wine->getImage_name(),
            ':prix' => $wine->getPrix_ht(),
            ':date' => $wine->getUpdate_at()
        ];

        $wine_statement->execute($param);

    }

    public function newCart(): int {

        $sql = 'INSERT INTO panier  VALUES (NULL, CURDATE(), '.$_SESSION['idUser'].')';
        $cart_statement = $this->dbconnect->query($sql);
        $idCart = $this->dbconnect->lastInsertId();
        return $idCart;
    }

    public function addItemCart(int $idCart, int $idVin, int $qtt){

        $sql = 'INSERT INTO item_panier  VALUES ('.$idVin.', '.$idCart.', '.$qtt.')';
        $cart_statement = $this->dbconnect->query($sql);

    }

}