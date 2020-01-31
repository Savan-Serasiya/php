<?php 
   
    function connection(){

        $server = "localhost";
        $user = "root";
        $password = "";
        $databaseName = "test";
        return mysqli_connect($server, $user, $password, $databaseName);
    }

    function fetchAll($tabelName){
        $con = connection();
        $sql = "Select * From $tabelName";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function deleteAll($tabelName){
        $con = connection();
        $sql = "DELETE  FROM $tabelName";
        $result = mysqli_query($con, $sql);
        return mysqli_affected_rows($con);
    }

    function deleteOne($tabelName, $id){
        $con = connection();
        $sql = "DELETE FROM $tabelName where customerId = $id";
        $result = mysqli_query($con, $sql);
        return mysqli_affected_rows($con);
    }
    /* function fetchRow($tabelName,$where){
        $con = connection();
        $sql = "Select customerName from $tabelName where customerId = $where";
        $result = mysqli_query($con, $sql);
        echo '<br>Select single row from tabel = '.mysqli_num_rows($result);
        echo '&nbsp; Total rows affected :'.mysqli_affected_rows($con);
    }
    fetchRow('customer',01);
 */

    function columnCount($tabelName){
        $con = connection();
        $sql = "SELECT * FROM $tabelName";
        $result = mysqli_query($con, $sql);
        return mysqli_field_count($con);
    }

    function insert($customerName, $phoneNumber){
        $con = connection();
        $sql = "INSERT INTO customer(customerName, phoneNumber) values ('$customerName','$phoneNumber')";
        $result = mysqli_query($con, $sql);
        return mysqli_affected_rows($con);
    }
?>

