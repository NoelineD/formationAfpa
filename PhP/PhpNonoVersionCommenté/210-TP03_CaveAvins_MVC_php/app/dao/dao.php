<?php

$dbconnect = new PDO('mysql:host=localhost;dbname=caveavin;charset=UTF8', 'root', '');

function getAllWine(){

    global $dbconnect;

    $sql = 'SELECT * FROM vin';
    $vin_statement = $dbconnect->query($sql);
    $vins = $vin_statement->fetchAll(PDO::FETCH_ASSOC);
    return $vins;
    
}

function setWine($reg, $cep, $rob, $name, $mil, $prix, $filename){

    global $dbconnect;

    $sql = 'INSERT INTO vin  VALUES (NULL, :reg, :cep, :mil, :rob, :nom, :file, CURDATE(), :prix)';
    $wine_statement = $dbconnect->prepare($sql);
    $wine_statement->bindParam('reg', $reg);
    $wine_statement->bindParam('cep', $cep);
    $wine_statement->bindParam('mil', $mil);
    $wine_statement->bindParam('rob', $rob);
    $wine_statement->bindParam('nom', $name);
    $wine_statement->bindParam('file', $filename);
    $wine_statement->bindParam('prix', $prix);

    $wine_statement->execute();
}