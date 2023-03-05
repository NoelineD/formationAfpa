<?php
/**
 * Description de la classe Concession
 *
 * @author Didier
 */
class Concession {
    
    private array $parc;
    
    public function __construct() {
        $this->parc = array();
    }
    

    public function addVoiture($voiture) {
        $this->parc[] = $voiture;
    }
    
    public function listeParc() {
        
        foreach ($this->parc as $voiture) {
            $voiture->rouler();
            echo "\n";
        }
    }
}
