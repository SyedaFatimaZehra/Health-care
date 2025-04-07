<?php
include('../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM patients WHERE patient_id='$id'";
$result= mysqli_query($db,$query);
if($result){
    echo "<script>alert('ACCOUNT DELETED SUCCESSFULLY');
    window.location.href='../login.php'
    </script>";
}
?>