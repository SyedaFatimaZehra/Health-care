<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Health Care Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body {
            background-image: url(img/med3.avif);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .text {
            font-size: larger;
            color: white;
            text-align: center;
            margin: 50px 0;
        }
        .para {
            color: white;
            text-align: center;
            margin: 20px 0;
            font-size: 1.2em;
        }
        .dash-widget {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        .dash-widget-bg1 {
            background-color: #007bff;
            padding: 20px;
            border-radius: 50%;
            display: inline-block;
        }
        .dash-widget-info h3 {
            font-size: 2em;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<?php
include('navbar.php');
include('sidebar.php');
include('../db_conn.php');
include('session_destroy.php');
session_start();
// if(!isset($_SESSION['name']) || !isset($_SESSION['email'])){
//     echo "<script>location.assign('../login.php');</script>";
// }
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <?php 
                        $query = "SELECT * FROM doctors";
                        $result = mysqli_query($db, $query);
                        $count = mysqli_num_rows($result);
                        echo "<h3>$count</h3>";
                        ?>	
                        <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <!-- Additional widgets can be added here -->
        </div>
        
        <div class="text">
            <h1>WELCOME <br> <span><?php echo $_SESSION['patient']; ?></span></h1>
        </div>
        
        <div class="img">
            <img src="img/home.jpg" alt="Home" class="img-fluid" style="max-height: 600px; width: 100%; object-fit: cover;">
        </div>
        
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
