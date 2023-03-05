<?php

$dbconnect = new PDO('mysql:host=localhost;dbname=caveavin;charset=UTF8', 'root', '');

function getAllWine(){

    global $dbconnect;

    $sql = 'SELECT * FROM vin';
    $vin_statement = $dbconnect->query($sql);
    $vins = $vin_statement->fetchAll(PDO::FETCH_ASSOC);
    return $vins;
    
}