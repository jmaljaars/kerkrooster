<?php
class loginController extends Controller{
    // deze functie verplaatsen we naar de parent class
    public function index(){
    //    echo 'Dit is de index van de login controller class';
        $this->setTitle('Login');
        $this->render('login.tpl');
    }
    
    public function login(){
            //echo 'U bent ingelogd!! (dit is de login functie van de login controller class)';
        //laadt de class loginModel
        $this->loadModel('login');
            //echo $_POST['username'];
            //echo $_POST['password'];
        
        $result = $this->model->checkUser($_POST['username'], $_POST['password']);
        if($result->num_rows==1){
            echo 'Je bent ingelogd als '.$result->row['email'];
        }else{
            $this->error_msg="<div id='fout'>Uw gebruikersnaam of wachtwoord is onjuist!!</div>";
            $this->index();
        }
    }
    
    public function register(){
        //registreren nieuwe gebruiker
        echo "registreren gebruiker";
    }
}



?>