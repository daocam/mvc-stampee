<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Enchere');
RequirePage::requireModel('Timbre');
RequirePage::requireLibrary('Validation');

class ControllerEnchere {

    public function index(){
        $encheres = new ModelEnchere;
        $select = $encheres->select();
        return Twig::render('enchere/enchere-index.php', ['encheres' => $select]);
    }


    public function create(){
        $timbres = new ModelTimbre;
        $select = $timbres->select('nom');    
        return Twig::render('enchere/enchere-create.php', ['timbres'=>$select]);
    }
  
    public function store() {
        $validation = new Validation;
        extract($_POST);
        
        $validation->name('nom')->value($nom)->pattern('words')->required()->max(45);
        $validation->name('date_debut')->value($date_debut)->pattern('date_ymd')->required()->max(10);
        $validation->name('date_fin')->value($date_fin)->pattern('date_ymd')->required()->max(10);
        $validation->name('prix_plancher')->value($prix_plancher)->pattern('int')->required()->max(12);

        if ($validation->isSuccess()) {
            $enchere = new ModelEnchere;
            $insert = $enchere->insert($_POST);
            RequirePage::redirect('enchere/index');   
        } else {
            $errors =  $validation->displayErrors();
            return Twig::render('enchere/enchere-create.php', ['errors' => $errors, 'enchere' => $_POST]);
        }
    }


    public function show($value){
        $enchere = new ModelEnchere;
        $selectId = $enchere->selectId($value);
  
        $timbre = new ModelTimbre;
        $selectTimbre = $timbre->selectId($selectId['idTimbre']);
        $enchereTimbre = $selectTimbre['nom'];
        
       return Twig::render('enchere/enchere-fiche.php', ['enchere' => $selectId, 'timbre' => $selectTimbre]);
      
    }


    /**
     * Affiche la page de modification des données d'une enchère
     */
    public function edit($value){
        if($_SESSION['idPrivilege'] == 1) {
            $enchere = new ModelEnchere;
            $selectId = $enchere->selectId($value);
            return Twig::render('enchere/enchere-edit.php', ['enchere' => $selectId]);
        }
        RequirePage::redirect('enchere/index'); 
    }

    /**
     * Mets à jour en validant les données d'une enchère 
     */
    public function update() {
        if($_SESSION['idPrivilege'] == 1) {
            $validation = new Validation;
            extract($_POST);

            $validation->name('nom')->value($nom)->pattern('words')->required()->max(45);
            $validation->name('date_debut')->value($date_debut)->pattern('date_ymd')->required()->max(10);
            $validation->name('date_fin')->value($date_fin)->pattern('date_ymd')->required()->max(10);
            $validation->name('prix_plancher')->value($prix_plancher)->pattern('int')->required()->max(12);
    
            if ($validation->isSuccess()) {
                $enchere = new ModelEnchere;
                $update = $enchere->update($_POST);
                RequirePage::redirect('enchere/index'); 
            } else {
                $errors =  $validation->displayErrors();
                return Twig::render('enchere/enchere-edit.php', ['errors' => $errors, 'enchere' => $_POST]);
            }
        }
        RequirePage::redirect('enchere/index');
    }

    /**
     * Supprime une enchère
     */
    public function delete() {
        if($_SESSION['idPrivilege'] == 1) {
            $enchere = new ModelEnchere;
            $delete = $enchere->delete($_POST);
            RequirePage::redirect('enchere/index'); 
        }
        RequirePage::redirect('enchere/index');
    }
}























?>