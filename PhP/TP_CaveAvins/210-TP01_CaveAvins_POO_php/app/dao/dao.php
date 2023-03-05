<?php

class Dao {

    private PDO $dbconnect;

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
        $vins = $vin_statement->fetchAll(PDO::FETCH_ASSOC);
        return $vins;
        
    }

    public function setWine($reg, $cep, $rob, $name, $mil, $prix, $filename){

        $sql = 'INSERT INTO vin  VALUES (NULL, :reg, :cep, :mil, :rob, :nom, :file, CURDATE(), :prix)';
        $wine_statement = $this->dbconnect->prepare($sql);
        $wine_statement->bindParam('reg', $reg);
        $wine_statement->bindParam('cep', $cep);
        $wine_statement->bindParam('mil', $mil);
        $wine_statement->bindParam('rob', $rob);
        $wine_statement->bindParam('nom', $name);
        $wine_statement->bindParam('file', $filename);
        $wine_statement->bindParam('prix', $prix);

        $wine_statement->execute();
    }

    public function getUserByLogin(string $login) : array {

        $sql = 'SELECT * FROM user WHERE email=:login;';

        $user_stat = $this->dbconnect->prepare($sql);
        $user_stat->bindParam('login', $login);
        $user_stat->execute();

        if ($user_stat->rowCount() == 1) {
            
            $user = $user_stat->fetch(PDO::FETCH_ASSOC);
            $user_stat = NULL;
            $dbconnect = NULL;
            return $user;
        } else {
            $user_stat = NULL;
            $dbconnect = NULL;
            throw new Exception('User non trouvé en base');
        }

    }

}