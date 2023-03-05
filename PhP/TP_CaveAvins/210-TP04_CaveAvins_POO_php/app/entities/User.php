<?php

class User {

    private ?int $id;
    private string $email;
    private string $roles;
    private string $password;

    public function __construct(string $email = '', string $role = '', string $psw = '') {
        $this->id = null;
        $this->email = $email;
        $this->roles = $role;
        $this->password = password_hash($psw, PASSWORD_DEFAULT);
    }

    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->roles;
    }
    public function getPassword(){
        return $this->password;
    }

}