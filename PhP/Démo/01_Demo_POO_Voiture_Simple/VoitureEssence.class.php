<?php
/**
 * Description de la classe VoitureEssence
 *
 * @author Didier Bonneau
 */
class VoitureEssence {
    
    private string $marque = '';
    private string $typeCarbur = '';
    
    // public function __construct(string $marque = 'inconnue') {
    //     $this->marque = ucfirst(strtolower($marque));
    //     $this->typeCarbur = 'Essence';
    // }

        public function getMarque(){
            return $this->marque;
        }

        public function getTypeCarbur(){
            return $this->typeCarbur;
        }

        public function setMarque($marq){
            $this->marque = ucfirst(strtolower($marq));
        }

        public function setTypeCarbur($carbur){
            $this->typeCarbur = $carbur;
        }

    public function rouler() {
        echo '<h2>Je suis une voiture à combustion</h2>';
        echo '<p>de marque '.$this->marque.' et je roule à l\''.$this->typeCarbur.'</p>';
    }
}
