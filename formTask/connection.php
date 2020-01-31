<?php 

    //Connection with Database
    function connection(){
        $server = "localhost";
        $user = "root";
        $password = "";
        $databaseName = "customer_portal";
        return mysqli_connect($server, $user, $password, $databaseName);
    }

    //Insert New Record
    function insert($tableName, $data){
        $conn = connection();
        $columns = array_keys($data);
        $values = array_values($data);
        $fields =implode(",", $columns);
        $values = "'".implode("','",$values)."'";
        $sql = "INSERT INTO $tableName(".$fields.") values(".$values.")";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $last_id = mysqli_insert_id($conn);
        return $last_id;
    }

    //Fetch All Records
    function fetchAll($tableName, $where){
        $conn = connection();
        $sql = "SELECT * FROM $tableName where $where";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Delete A Record
    function deleteRow($tableName, $customerId){
        $conn = connection();
        $sql = "DELETE FROM $tableName WHERE customerId = $customerId";
        $result = mysqli_query($conn, $sql);
    }

    
    //Update record using key
    function updateRow($tableName, $data, $customerId, $where){
    
        $conn = connection();
        $sql = "UPDATE $tableName SET ";
        $count = 1;
        foreach($data as $key => $value){
            if(sizeof($data) > $count){
                $sql .= " $key = "."'".$value."', ";
                $count++;
            }else{
                $sql .= " $key ="."'".$value."' ";
            }    
        }
        $sql .= $where;
        echo $sql;
        $result = mysqli_query($conn, $sql);   
    }

    
    //fetch for display in display.php file
    function fetchJoin(){
        $conn = connection();
        $sql = "SELECT 
        C.customerId,
        C.firstName,
        C.lastName,
        CA.company,
        CA.city,
        CO.otherValues hobbies
        FROM 
            customers C LEFT JOIN customer_address CA  
            ON C.customerId = CA.customerId
            LEFT JOIN customer_other CO
            ON C.customerId = CO.customerId AND CO.otherKeys = 'hobbies'";

            $result = mysqli_query($conn, $sql);
            return $result;
    }


    function fetchRow($tableName ,$customerId){
        $conn = connection();
        $sql = "SELECT * FROM $tableName WHERE customerId = $customerId";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

?>