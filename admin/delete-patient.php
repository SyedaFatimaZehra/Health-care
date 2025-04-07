<?php
include('../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM patients WHERE patient_id=$id";
$result= mysqli_query($db, $query);
if($result){
    echo "<script>alert('Patient deleted successfully')</script>";
    echo "<script>location.assign('patients.php')</script>";
}

?>