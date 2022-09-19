<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('User');
RequirePage::requireModel('Privilege');
RequirePage::requireLibrary('Validation');

class ControllerUser {

    public function index(){
        return Twig::render('user/user-index.php');
    }

    public function list() {
        CheckSession::SessionAuth();
        if($_SESSION['idPrivilege'] == 1) {
            $user = new ModelUser;
            $select = $user->select();
            return Twig::render('user/user-list.php', ['users' => $select]);
        }
        RequirePage::redirect('home'); 
    }

    public function create(){
        $privileges = new ModelPrivilege;
        $select = $privileges->select('privilege');    
        return Twig::render('user/user-create.php', ['privileges'=>$select]);
    }

    public function store(){
        
        $validation = new Validation;
        extract($_POST);
        $validation->name('email')->value($email)->pattern('email')->required();
        $validation->name('password')->value($password)->max(20)->min(6)->required();
        if($validation->isSuccess()){
            $options = [
                'cost' => 10,
            ];
            $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);
    
            $user = new ModelUser;
            $_POST['email'] = $email;
            $_POST['password'] = $hashPassword;
            $insert = $user->insert($_POST);
            RequirePage::redirect('home');
        }else{
            $errors =  $validation->displayErrors();
            return Twig::render('user/user-create.php', ['errors' => $errors, 'user' => $_POST]);
        }
    }
}