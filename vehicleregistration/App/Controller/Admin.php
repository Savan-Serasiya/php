<?php 
    namespace App\Controller;
    use Core\View;
    use \App\Model\AdminModel;

    class Admin extends \Core\Controller{
        public function dashboard()
        {   
            $actionMessage = '';
            if(isset($_SESSION['message'])){
                $actionMessage = $_SESSION['message'];
                unset($_SESSION['message']);
            }
            
            $query = "SELECT * FROM service_registration";
            $data =  AdminModel::select($query);
            View::renderTemplate('Admin/Dashboard.html', ['serviceData' => $data, 'actionMessage' => $actionMessage]);
        }
        public function deleteService(){
           $serviceId =  $this -> route_params['id'];
           $query = "DELETE FROM service_registration WHERE serviceId = '$serviceId'";
           $result = AdminModel::deleteUpdate($query);
           if($result != '0'){
               $_SESSION['message'] = "Delete Successfully";
               header('Location: ../dashboard');
           }else{
                $_SESSION['message'] = "Item Not Deleted";
                header('Location: ../dashboard');
           }
        }

        public function editService(){
            $serviceId = $this -> route_params['id'];
            $query = "SELECT * FROM service_registration WHERE serviceId = '$serviceId'";
            $data = AdminModel::getRow($query);
            View::renderTemplate('Admin/EditService.html', ['serviceData' => $data]);
        }

        public function updateService(){
            $serviceId = $this -> route_params['id'];
            extract($_POST);

            $query = "UPDATE
                    service_registration
                    SET
                       title = '$title',
                       vehicleNumber = '$vehicleNumber',
                       licenceNumber = '$licenseNumber',
                       date = '$date',
                       timeSlot = '$timeSlot',
                       vehicleIssue = '$vehicleIssue',
                       serviceCenter = '$serviceCenter',
                       status = '$status'
                    WHERE serviceId = '$serviceId';";
                //echo $query;
                $result = AdminModel::deleteUpdate($query);
                if($result != '0'){
                   $_SESSION['message'] = "Record Update Successfully";
                   header('Location: ../Dashboard');
                }else{
                    $_SESSION['message'] = "Record Not Updated";
                    header('Location: ../Dashboard');
                }
        }
    }