<?php
require_once 'Vehicule.class.php';
/**
 * Description of Concessionnaire
 *
 * @author Didier
 */
class Concession {
    
    private array $parc;
    
    public function __construct() {
        $this->parc = array();
    }
    

    public function addVehicule(Vehicule $voiture) {
        $this->parc[] = $voiture;
    }
    
    public function listeParc() {
        
        foreach ($this->parc as $voiture) {
            echo $voiture."\n";
        }
    }
}
