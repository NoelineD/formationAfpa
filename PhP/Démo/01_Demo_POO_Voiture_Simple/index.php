<?php
require 'VoitureEssence.class.php';
require 'VoitureElectrique.class.php';
// require 'Concession.class.php';

$voiture1 = new VoitureEssence();

// $voiture1->rouler();

$voiture1->setMarque('renault');
$voiture1->setTypeCarbur('essence');
// $voiture1->rouler();

$voiture2 = new VoitureElectrique('Toyota');

// $voiture2->rouler();

$voiture3 = new VoitureEssence();
$voiture3->setMarque('Citroen');
$voiture3->setTypeCarbur('diesel');

// $voiture3->rouler();

$concession = [];

$concession[] = $voiture1;
$concession[] = $voiture2;
$concession[] = $voiture3;

foreach ($concession as $voiture) {
   $voiture->rouler();
}

// $conces = new Concession();


// $conces->addVoiture($voiture1);
// $conces->addVoiture($voiture2);
// $conces->addVoiture($voiture3);

// $conces->listeParc();
