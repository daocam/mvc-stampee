<?php

RequirePage::requireModel('CRUD');
RequirePage::requireModel('Enchere');
RequirePage::requireLibrary('Validation');

class ControllerHome {
    public function index() {
        $encheres = new ModelEnchere;
        $select = $encheres->select();
        return Twig::render('home-index.php', ['encheres' => $select]);
    }
    
    public function error() {
        return Twig::render('error.php');
    }
}

?>