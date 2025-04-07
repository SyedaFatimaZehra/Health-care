<?php
include(' ../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM doctors WHERE `available_days`='$days' , `available_time`='$time'";
$result= mysqli_query($db,$query);
if ($result){
echo "<script>alert('DATA DELETED SUCCESSFULLY');
window.location.href='schedule.php'</script>";
}
