<?php
include('../db_conn.php');

if(isset( $_POST['submit'])){
    $name =$_POST['name'];
    $gender =$_POST['gender'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $medical =$_POST['medical'];
    $query = "INSERT INTO `patients`(`patient_name`,`gender`, `email`, `phone`, `address`, `medical_history`) VALUES ('$name','$gender','$medical','$email','$address','$phone')";
    $final=mysqli_query($db,$query);
    if($final){
        echo "<script>alert('data inserted')</script>";
        header("location: patients.php");
    }
    }
?>