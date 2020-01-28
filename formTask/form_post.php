<?php 
        session_start();
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        function getValue($sectionName, $fieldName,$returnType = ''){
            return isset($_POST[$sectionName][$fieldName]) ? $_POST[$sectionName][$fieldName] : $returnType;
        }

        function setSession($sectionName){
            (isset($_POST[$sectionName])) ? $_SESSION[$sectionName] = $_POST[$sectionName] : [];
        }

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

        if(isset($_POST['submit'])){
            setSession('account');
            setSession('address');
            setSession('other');
        }    
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';         

?>