<!DOCTYPE html>
<html lang="en">


<!-- add-doctor24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php 
    include ('session_destroy.php');
    ?>
    <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a href="index.php"><i class="fa fa-calendar"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-calendar"></i> <span>Profile</span></a>
                </li>
                <!-- <li>
                    <a href="appointment.php"><i class="fa fa-calendar"></i> <span>Make An Appointment</span></a>
                </li> -->
                <li>
                    <a href="search.php"><i class="fa fa-calendar"></i> <span>Search Doctor <br> & Book Appointment</span></a>
                </li>
                        <?php 
                        $fetch = "SELECT * FROM patients";
                        $result = mysqli_query($db,$fetch);
                        $data = mysqli_fetch_assoc($result);
                        
                        ?>
                        <li><a href="delete-account.php?id=<?php echo $data['patient_id'] ?>" onclick="return confrimDelete()"> Delete account ? </a></li>
                        <li><a href="logout.php"> Logout </a></li>
                    </li>
            </ul>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script>
    function confrimDelete(){
        return confirm('Are you sure you want to delete your account ?');
    
    }
</script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>