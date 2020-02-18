<?php 
    namespace App\Controller;
    use \Core\View;
    class Admin extends \Core\Controller{

        public function login()
        {
            View::renderTemplate('Login/index.html');
        }

        public function dashboard(){
            View::renderTemplate('Dashboard/index.html');
        }

        public function loginAction()
        {
            extract($_POST);
            if($username == 'admin' && $password == 'admin'){
                header('Location: dashboard');
            }else if($username == ''){
                View::renderTemplate('Login/index.html', ['errorUsername' => 'Invalid Username']);
            }else if($password == ''){
                View::renderTemplate('Login/index.html', ['errorPassword' => 'Invalid Password']);
            }else{
                View::renderTemplate('Login/index.html', ['errorInvalid' => 'Invalid Details']);
            }
        }

      
    }
?>