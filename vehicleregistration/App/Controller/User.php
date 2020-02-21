<?php 
    namespace App\Controller;
    use Core\View;
    use \App\Model\UserModel;

    class User extends \Core\Controller{
        public function index()
        {
            View::renderTemplate('Home/index.html');
        }

        public function login(){
            if(isset($_SESSION['userId'])){
                header('Location: User/userProfile');
            }

            $error = '';
            if(isset($_SESSION['error'])){
                $error = $_SESSION['error'];
                unset($_SESSION['error']);
            }
            View::renderTemplate('User/login.html', ['error' => $error]);
        }

        public function registration(){
            View::renderTemplate('User/registration.html');
        }

        public function userProfile(){
            if(!isset($_SESSION['userId'])){   
                header('Location:login');
            }else{
                $userId = $_SESSION['userId'];
            echo $userId;
            $query = "SELECT * FROM service_registration WHERE userId = $userId";
            $data = UserModel::select($query);
            View::renderTemplate('User/userProfile.html',['serviceData' => $data]);
            }   
        }

        public function vehicleRegister(){
            if(!isset($_SESSION['userId'])){
                header('Location:login');
            }else{
              $error = '';
              if(isset($_SESSION['error'])){
                $error = $_SESSION['error'];
                unset($_SESSION['error']);
              }
              View::renderTemplate('User/vehicleRegister.html',['error' => $error]);
            }
        }

        public function DoVehicleRegistration(){
            extract($_POST);
            $userId = $_SESSION['userId'];
            $query = "INSERT INTO service_registration(
                userId,
                title,
                vehicleNumber,
                licenceNumber,
                date,
                timeSlot,
                vehicleIssue,
                serviceCenter
                )
                VALUES(
                    '$userId',
                    '$title',
                    '$vehicleNumber',
                    '$licenseNumber',
                    '$date',
                    '$timeSlot',
                    '$vehicleIssue',
                    '$serviceCenter'
                )";
                $lastId = UserModel::insert($query);
                if($lastId == '0'){
                        $_SESSION['error'] = "Duplicate Entry";
                        header('Location: vehicleRegister');
                }else{
                    header('Location: userProfile');
                }
        }

        public function DoLogin(){
            extract($_POST);
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $userData = UserModel::getRow($query);
            if(isset($userData) && !empty($userData)){
                $_SESSION['userId'] = $userData['userId'];
                header('Location: userProfile');    
            }else{
                $_SESSION['error'] = "Invalid Email or Password";
                header('Location: login');
            }
            
        }

        public function DoRegistration(){
            extract($_POST);
            $query = "INSERT INTO users(
                    firstName,
                    lastName,
                    email,
                    password,
                    phoneNumber )
                    VALUES('$firstName', '$lastName', '$email', '$password', '$phoneNumber')";
             $lastId = UserModel::insert($query);
             echo $lastId;

             $queryAddress = "INSERT INTO user_addresses(
                userId,
                street,
                city,
                state,
                zipCode,
                country)
                VALUES(
                '$lastId',
                '$street',
                '$city',
                '$state',
                '$zipCode',
                '$country'
                )";

            $lastId = UserModel::insert($queryAddress);
            echo $lastId;
            header('Location: login');
        }

        public function logout(){
            session_destroy();
            header('Location: login');
        }
    }
?>