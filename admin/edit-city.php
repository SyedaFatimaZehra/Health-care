<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

<?php
include('../db_conn.php');
// include ('session_destroy.php');

$id = $_GET['id'];
$query = "SELECT * FROM `cities` WHERE city_id=$id";
$result = mysqli_query($db, $query);
if ($result){
    while ($data = mysqli_fetch_assoc($result)){
?>


<div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit City</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City Name</label>
                                        <input class="form-control" type="text" name="name"value="<?php echo $data['city_name'] ?>">
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>
			
            <?php
            
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $query = "UPDATE `cities` SET `city_name`='$name' WHERE city_id=$id";
                $result = mysqli_query($db, $query);
                if($result){
                    echo "<script> alert('City Updated Successfully')</script>";
                    echo "<script> location.href='cities.php'</script>";
                }else{
                    echo "<script> alert('City Not Updated')</script>";
                }
            }
            ?>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- add-patient24:07-->
</html>
