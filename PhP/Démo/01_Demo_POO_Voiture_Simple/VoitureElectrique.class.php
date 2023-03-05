<?php
/**
 * Description de la classe VoitureElectrique
 *
 * @author Didier Bonneau
 */
class VoitureElectrique {
    
    private string $marque;
    private string $typeCarbur;
    
    public function __construct(string $marque) {
        $this->marque = ucfirst(strtolower($marque));
        $this->typeCarbur = 'Electricité';
    }

    public function rouler() {
        echo "<h2>Je suis une voiture ecologique</h2>";
        echo "<p>\nde marque ".$this->marque." et je roule à l'".$this->typeCarbur."</p>";
    }
}
