<?php 
include 'connection.php';

        session_start();
        //session_destroy();
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    
        //get Value for display in control
        function getValue($sectionName, $fieldName , $returnType = ''){
            return isset($_POST[$sectionName][$fieldName]) ? $_POST[$sectionName][$fieldName] : getSession($sectionName, $fieldName, $returnType);
        }

        //get Values from Session
        function getSession($sectionName, $fieldName, $returnType){
            return $returnType;#isset($_SESSION[$sectionName][$fieldName]) ? $_SESSION[$sectionName][$fieldName] : $returnType;
        }

        //set all values in session
        function setSession($sectionName){
            (isset($_POST[$sectionName])) ? $_SESSION[$sectionName] = $_POST[$sectionName] : [];
        }

        // Cleanup data of Account Section
        function prepareAccount($accountData){
            unset($accountData['confirmPassword']);
            unset($accountData['prefix']);
            if(isset($_SESSION['update_id'])){

                $updateId = $_SESSION['update_id'];
                $where = "WHERE customerId = $updateId";
                updateRow('customers', $accountData, $updateId, $where);
                prepareAddress($_POST['address'], $updateId);
                prepareOther($_POST['other'], $updateId);

            }else{

                $last_id = insert('customers', $accountData);
                prepareAddress($_POST['address'], $last_id);
                prepareOther($_POST['other'], $last_id);
            }             
        }

        //cleanup data of Address Information Section
        function prepareAddress($addressData, $last_id){
            $addressData['customerId'] = $last_id;
            if(isset($_SESSION['update_id'])){
                $where = "Where customerId = $last_id";
                updateRow('customer_address', $addressData, $last_id, $where);
            }else{

                $last_id = insert('customer_address', $addressData);
            }
        }

        // cleanup data of other information Section 
        function prepareOther($otherData, $last_id){
            
            if(isset($_SESSION['update_id'])){
                $data = [];
                foreach($otherData as $key => $value){

                    if(is_array($otherData[$key])){
                        $data['customerId'] = $last_id;
                        $data['otherKeys'] = $key;
                        $data['otherValues'] = implode('_',$value);
                        $where = "WHERE otherKeys ='$key' AND customerId = $last_id";
                        updateRow('customer_other', $data, $last_id, $where);
                    }else{
                        $data['customerId'] = $last_id;
                        $data['otherKeys'] = $key;
                        $data['otherValues'] = $value;
                        $where = "WHERE otherKeys ='$key' AND customerId = $last_id";
                        updateRow('customer_other', $data, $last_id, $where);
                    }
                }
                unset($_SESSION['update_id']);
            }else{
                $data = [];
                foreach($otherData as $key => $value){

                    if(is_array($otherData[$key])){
                        $data['customerId'] = $last_id;
                        $data['otherKeys'] = $key;
                        $data['otherValues'] = implode('_',$value);
                        insert('customer_other', $data);
                    }else{
                        $data['customerId'] = $last_id;
                        $data['otherKeys'] = $key;
                        $data['otherValues'] = $value;
                        insert('customer_other', $data);
                    }
                }
            }
        }

        //validation of fields 
        function isValidate($sectionName, $fieldName){
            switch($fieldName){
                case 'firstName':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;
                
                case 'lastName':
                    if(!empty($_POST[$sectionName][$fieldName])){    
                        return true;
                    }else{
                        
                        return false;
                    }
                break;
                case 'dateOfBirth':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;

                case 'phoneNumber':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;

                case 'emailAddress':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;

                case 'password':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;

                case 'confirmPassword':
                    if(!empty($_POST[$sectionName][$fieldName])){
                        return true;
                    }else{
                        return false;
                    }
                break;
            }
        }
        

        //get single record for Update

        function getRow(){

            $result = fetchRow('customers', $_GET['Edit']);
            $row = mysqli_fetch_assoc($result);
            $_POST['account'] = $row;
        
            $result = fetchRow('customer_address', $_GET['Edit']);
            $row = mysqli_fetch_assoc($result);
            $_POST['address'] = $row;

            $result = fetchRow('customer_other', $_GET['Edit']);
            
            while($row = mysqli_fetch_assoc($result)){
                $_POST['other'][$row['otherKeys']] = $row['otherValues'];
                
                if($row['otherKeys'] == 'inTouch'){
                    $_POST['other']['inTouch'] = explode('_',$row['otherValues']);
                }

                if($row['otherKeys'] == 'hobbies'){
                    $_POST['other']['hobbies'] = explode('_',$row['otherValues']);
                }
            }
        }



        //store update key in session
        if(isset($_GET['Edit']) && !empty($_GET['Edit'])){
            $_SESSION['update_id'] = $_GET['Edit'];
            getRow();
            
        }

        // check condition for update records
        if(isset($_POST['update']) && isset($_SESSION['update_id'])){
            if(isset($_POST['account'])){
                prepareAccount($_POST['account']);
              }
        }else{
           
        }
        
        //for insert new Record
        if(isset($_POST['submit'])){
            if(isset($_POST['account'])){
               prepareAccount($_POST['account']);
            }
        }         
?>