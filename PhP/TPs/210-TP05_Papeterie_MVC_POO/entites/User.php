<?php

/**
 * Description of User
 *
 * @author DWWM Name <Didier.Bonneau at Afpa.Creteil>
 */
class User {
    
    private ?int $id_user;  // le ? indique que la propriété peut être null
    private string $nom_user;
    private string $prenom_user;
    private string $role_user;
    private string $login_user;
    private string $psw_user;
    
    public function __construct(string $nom = '', string $prenom = '', string $login = '', string $psw ='') {
        $this->nom_user = $nom;
        $this->prenom_user = $prenom;
        $this->login_user = $login;
        $this->psw_user = password_hash($psw, PASSWORD_DEFAULT);
        $this->id_user = null;
        $this->role_user = 'client';
    }

    // getters
    public function getId_user(): int {
        return $this->id_user;
    }
    public function getNom_user(): string {
        return $this->nom_user;
    }
    public function getPrenom_user(): string {
        return $this->prenom_user;
    }
    public function getRole_user(): string {
        return $this->role_user;
    }
    public function getLogin_user(): string {
        return $this->login_user;
    }

    public function getPsw_user(): string {
        return $this->psw_user;
    }


}
