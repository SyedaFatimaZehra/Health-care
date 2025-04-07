<?php
include('../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM doctors WHERE doctor_id=$id";
$result= mysqli_query($db, $query);
if($result){
echo "<script>alert('Doctor Deleted Successfully');
window.location.href='doctors.php'</script>";
}

?>