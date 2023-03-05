<?php

require_once 'Vehicule.class.php';

/**
 * Description de la classe VoitureEssence
 *
 * @author Didier Bonneau
 * @see Vehicule : classe mère
 */
class VoitureEssence extends Vehicule {

    private int $reservoir;

    public function __construct(string $marque, int $res) {

        parent::__construct($marque, 'essence');
        $this->reservoir = $res;
    }

    public function getAutonomie() {
        return ($this->reservoir /5) * 100;
    }

    public function rouler($kms) {
        $this->reservoir -= $kms * 0.05;    //consomme 5 litres au 100kms
    }


}
