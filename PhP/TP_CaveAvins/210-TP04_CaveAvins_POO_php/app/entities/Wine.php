<?php

class Wine {

    private ?int $id;
    private string $region;
    private string $cepage;
    private int $milesime;
    private string $robe;
    private string $nom;
    private string $image_name;
    private ?string $update_at;
    private float $prix_ht;

    //constructeur
    public function __construct(
        string $region = '',
        string $cepage = '',
        int $milesime = 0,
        string $robe = '',
        string $nom = '',
        string $image_name = '',
        float $prix_ht = 0.0
        )
        {
          $this->id = null;
          $this->nom = $nom;
          $this->robe = $robe;
          $this->region = $region;
          $this->milesime = $milesime;
          $this->cepage = $cepage;
          $this->image_name = $image_name;
          $this->prix_ht = $prix_ht;
          $this->update_at = date("Y-m-d H:i:s");  
    }

    // les getteurs
    public function getId(){
        return $this->id;
    }
    public function getRegion(){
        return $this->region;
    }
    public function getCepage(){
        return $this->cepage;
    }
    public function getMilesime(){
        return $this->milesime;
    }
    public function getRobe(){
        return $this->robe;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getImage_name(){
        return $this->image_name;
    }
    public function getUpdate_at(){
        return $this->update_at;
    }
    public function getPrix_ht(){
        return $this->prix_ht;
    }

}