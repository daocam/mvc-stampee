<?php

    class ModelUser extends CRUD {
    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';

    protected $fillable = ['nom', 'email', 'password', 'idPrivilege'];

    public function checkuser($email, $password){
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($email));

        $count=$stmt->rowCount();

        if($count==1){
            $user_info = $stmt->fetch();
            $dbPassword = $user_info["password"];
            if(password_verify($password, $dbPassword)){
        
                session_regenerate_id();
                $_SESSION['idUtilisateur'] = $user_info['id'];
                $_SESSION['idPrivilege'] = $user_info['idPrivilege'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                
                RequirePage::redirect('home');

            }else{
                echo "Le mot de passe n'est pas correct";
            }
        } else {
            echo "Le courriel de l utilisateur n'est pas correct";
        }    
        
    }
} 


?>