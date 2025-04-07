<?php
include('../db_conn.php');
$id=$_GET['id'];
$query= "DELETE FROM medicalnews WHERE news_id =$id";
$result= mysqli_query($db, $query);
if($result){
echo "<script>alert('News Deleted Successfully');
window.location.href='medical-news.php'</script>";
}

?>
