<?php
include('../db_conn.php');

if(isset( $_POST['submit'])){
    $name =$_POST['name'];
    $query= "INSERT INTO `cities`( `city_name`) VALUES ('$name')";
    $final=mysqli_query($db,$query);
    if($final){
        echo "<script>alert('city inserted successfully');
        window.location.href='cities.php'</script>";
    }
    
    }
?>