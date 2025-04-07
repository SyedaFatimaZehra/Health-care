<?php
include('../db_conn.php');
// include('add-doctor.html');

if(isset( $_POST['submit'])){
    // $id =$_POST['doctor_id'];
    $name =$_POST['name'];
    $affiliation =$_POST['affiliation'];
    $gender = $_POST['gender'];
    $city =$_POST['city'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $phone =$_POST['phone'];
    $specialization =$_POST['specialization'];
    $experience	 =$_POST['experience'];
    $address =$_POST['address'];
    $days =$_POST['days'];
    $time =$_POST['time'];
    $doc_img = $_FILES['image']['name'];
    $doc_img_temp = $_FILES['image']['tmp_name'];
    $img_folder = "img/";
    move_uploaded_file($doc_img_temp, $img_folder.$doc_img);
    // $check = "SELECT * FROM `doctors`"; 
    
    $query = "INSERT INTO doctors (doctor_name,profile_pic,gender,hospital_affiliation,email,password,phone,specialization,experience,address,city_id,available_days,available_time) VALUES ('$name','$doc_img','$gender','$affiliation','$email','$password','$phone','$specialization','$experience','$address','$city','$days','$time')";
    $d_query = "INSERT INTO user (username,email,usertype) VALUES ('$name','$email','d')";
    $final = mysqli_query($db,$query);
    $final2 = mysqli_query($db,$d_query);
    if($final && $final2){
        echo "<script>alert('Doctor Added Successfully');
        window.location.href='doctors.php';
        </script>";
    }
    else{
        echo "<script>alert('Failed to add Doctor');
        window.location.href='add-doctor.php';
        </script>";
    }
    // $data = mysqli_fetch_assoc($final);
    // // $check= "SELECT * FROM `doctors`";
    // $result = mysqli_query($check,$db);
}
?>