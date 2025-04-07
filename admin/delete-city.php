<?php
include('../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM cities WHERE city_id=$id";
$result= mysqli_query($db, $query);
if($result){
echo "<script>alert('City Deleted Successfully');
window.location.href='cities.php'</script>";
}

?>