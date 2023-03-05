<?php

class MainControleur {

    public function execute($action) {
        
        switch ($action) {
            case 'home':
                $this->creerVue('./vues/home');
                break;
            case 'mentions':
                $this->creerVue('./vues/mentions');
                break;

            default:
                break;
        }
    }

    public function creerVue($vue, $param = []) {

        extract($param);
        include './vues/template.php';
    }

}
