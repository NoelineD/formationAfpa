<?php
require 'Vehicule.class.php';
require 'VoitureEssence.class.php';
require 'VoitureElectrique.class.php';
require 'Concession.class.php';

$voiture1 = new VoitureEssence('Renault', 40);
//var_dump($voiture1);

$voiture1->rouler(100);
echo $voiture1;

$voiture2 = new VoitureElectrique('Toyota', 25000);

$voiture2->rouler(100);
echo $voiture2;

//$voiture3 = new VoitureEssence('Citroen', 10);

//$concession = [];
//
//$concession[] = $voiture1;
//$concession[] = $voiture2;
//
//foreach ($concession as $voiture) {
//    $voiture->rouler();
//}

//$conces = new Concession();
//
//
//$conces->addVehicule($voiture1);
//$conces->addVehicule($voiture2);
//$conces->addVehicule($voiture3);
//
//$conces->listeParc();
//
//$voiture1->rouler(150);
//
//$conces->listeParc();