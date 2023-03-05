<?php
require_once 'app/controller/Controller.php';

class AppController extends Controller {

    public function home(){
        $this->createView('home', []);
    }

    public function about(){
        $this->createView('about', []);
    }

    public function error(){
        global $except;
        $this->createView('error', ['erreur' => $except->getMessage()]);
    }
}