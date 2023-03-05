<?php
require_once 'Vehicule.class.php';

/**
 * Description de la classe VoitureEssence
 *
 * @author Didier Bonneau
 */
class VoitureElectrique extends Vehicule {
    
    private int $charge;

    public function __construct(string $marque, int $charge) {
        
        parent::__construct($marque, 'électricité');
        $this->charge = $charge;
        
    }

    public function getAutonomie(): int {
        return $this->charge / 100;
    }

    public function rouler($kms) {
        $this->charge -= $kms * 10;    // consomme 1kwh par 100km
    }

}
