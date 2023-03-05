<?php
/**
 * Description de laa classe Vehicule
 *
 * @author Didier Bonneau
 */
class Vehicule {
    //propriétés
    private string $marque;
    private string $typeCarbur;
    
    public function __construct(string $marque = '', string $type = '') {
        $this->marque = ucfirst(strtolower($marque));
        $this->typeCarbur = $type;
    }

    protected function getMarque(): string {
        return $this->marque;
    }
    
    protected function getTypeCarbur(): string {
        return $this->typeCarbur;
    }

    public function __toString(): string {
        //var_dump($this);
        $infos = "\nJe suis une ".$this->marque." et je roule à l'".$this->typeCarbur;
        $infos .= "\nJ'ai une autonomie de ".$this->getAutonomie()." kms";
        return $infos;
    }

}
