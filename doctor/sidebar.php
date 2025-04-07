<!DOCTYPE html>
<html lang="en">
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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<?php 
        // session_start();
    	if(!isset($_SESSION['doctor']) || !isset($_SESSION['email'])){
            header('location: ../login.php');
        }
?>
<body>
    <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                 
                <li>
                    <a href="profile.php"><i class="fa fa-calendar"></i> <span>Profile</span></a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li>
                    <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                </li>
                        <?php 
                        $fetch = "SELECT * FROM doctors";
                        $result = mysqli_query($db,$fetch);
                        $data = mysqli_fetch_assoc($result);
                        
                        ?>
                        <li><a href="delete-account.php?id=<?php echo $data['doctor_id'] ?>" onclick="return confirmDelete()"> Delete account ? </a></li>
                       <li> <a class="dropdown-item" href="logout.php">Logout</a></li>
                      
                    
            </ul>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
 <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
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