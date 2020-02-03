<?php
    
    function getConnection(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "blog_post";
        return mysqli_connect($host, $user, $password, $database);
    }
    
    function insert($tableName, $data){
        $conn = getConnection();
        $keys = array_keys($data); 
        $fieldName = implode(',', $keys);

        $value =  array_values($data);
        $fieldValues = "'".implode("','",$data)."'";
        
        $sql = "INSERT INTO $tableName($fieldName) VALUES($fieldValues)";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);   
    }

    function loginGet($email, $password){
        $conn = getConnection();
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function getDatas($tableName){
        $conn = getConnection();
        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($conn,$sql);
        return $result;
    }    

    function deleteRow($tableName, $fieldName, $recordId){
        $conn = getConnection();
        $sql = "DELETE FROM $tableName WHERE $fieldName = '$recordId'";
        $result = mysqli_query($conn, $sql);
    }

    function getPostData($tableName, $userId){
        $conn = getConnection();
        $sql = "SELECT * FROM $tableName WHERE userId = $userId";
        $result = mysqli_query($conn,$sql);
        return $result;
    }    

    function getDataRow($tableName, $fieldName, $fieldValue){
        $conn = getConnection();
        $sql = "SELECT * FROM $tableName WHERE $fieldName = '$fieldValue'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
?>