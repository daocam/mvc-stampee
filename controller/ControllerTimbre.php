<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Timbre');
RequirePage::requireModel('Image');
RequirePage::requireLibrary('Validation');

class ControllerTimbre {

    public function index(){
        return Twig::render('timbre-index.php');
    }


    public function create() {   
        $images = new ModelImage;
        $select = $images->select('filename'); 
        return Twig::render('timbre-create.php', ['images'=>$select]);
    }


    public function store() {
        $validation = new Validation;
        extract($_POST);
    
        $validation->name('nom')->value($nom)->pattern('words')->required()->max(45);
        $validation->name('date_creation')->value($date_creation)->pattern('int')->required()->max(4);
        $validation->name('couleurs')->value($couleurs)->pattern('alpha')->required()->max(45);
        $validation->name('pays')->value($pays)->pattern('alpha')->required()->max(45);
        //$validation->name('dimensions')->value($dimensions)->pattern('text')->required()->max(45);
        $validation->name('tirage')->value($tirage)->pattern('int')->required()->max(12);

        if ($validation->isSuccess()) {
            $timbre = new ModelTimbre;

            $_POST['nom'] = $nom;
            $_POST['date_creation'] = $date_creation;
            $_POST['couleurs'] = $couleurs;
            $_POST['pays'] = $pays;
            $_POST['conditions'] = $conditions;
            $_POST['tirage'] = $tirage;
            $_POST['dimensions'] = $dimensions;
            $_POST['certifie'] = $certifie;

            $insert = $timbre->insert($_POST);

            if (isset($_FILES['filename']) && $_FILES['filename']['error'] == 0)
            {
                if ($_FILES['filename']['size'] <= 1000000)
                {
                    $folder = 'assets/uploads/';
                    $tempname = $_FILES['filename']['tmp_name'];
                    $filename = $_FILES['filename']['name'];
                    $fileInfo = pathinfo($filename);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'png'];

                    if (in_array($extension, $allowedExtensions))
                    {
                        move_uploaded_file($tempname, $folder . basename($filename));
                        $image = new ModelImage;
                        $tableau = array('filename' => $filename, 'idTimbre' => $insert);
                        $image->insert($tableau);
                    }
                    else
                    {
                        echo "Le téléchargement de l'image a échoué !"; 
                    }
                }
            }

            RequirePage::redirect('enchere/create');

        } else {
            $errors =  $validation->displayErrors();
            return Twig::render('timbre-create.php', ['errors' => $errors, 'timbre' => $_POST]);
        }
    }
}























?>