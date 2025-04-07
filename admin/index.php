<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body {
            background-image: url(img/med2.webp);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .text {
            font-size: larger;
            color: white;
            text-align: center;
            margin: 20px 0;
        }
        .dash-widget {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin: 15px;
            transition: transform 0.3s;
        }
        .dash-widget:hover {
            transform: scale(1.05);
        }
        .widget-title {
            font-size: 1.2em;
            color: #333;
        }
        .img-container {
    width: 100%; /* Make the container full width */
    height: auto; /* Height adjusts based on content */
    overflow: hidden; /* Hide overflow if the image is too large */
}

.img-container img {
    width: 100%; /* Make image full width of the container */
    height: auto; /* Maintain aspect ratio */
    max-height: 500px; /* Set a maximum height */
    object-fit: cover; /* Cover the entire container, maintaining aspect ratio */
}

    </style>
</head>

<body>
<?php
    include('../db_conn.php');
    include('navbar.php');
    include('sidebar.php');
    session_start();
    if (!isset($_SESSION['admin']) || !isset($_SESSION['email'])) {
        header('location: ../login.php');
    }
?>
<div class="page-wrapper">
    <div class="content">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <?php 
                    $query = "SELECT * FROM admin";
                    $result = mysqli_query($db, $query);
                    $count = mysqli_num_rows($result);
                    echo "<h3>$count</h3>";
                ?>  
                <span class="widget-title">ADMIN <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <?php 
                    $query = "SELECT * FROM doctors";
                    $result = mysqli_query($db, $query);
                    $count = mysqli_num_rows($result);
                    echo "<h3>$count</h3>";
                ?>  
                <span class="widget-title">DOCTORS <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <?php 
                    $query = "SELECT * FROM patients";
                    $result = mysqli_query($db, $query);
                    $count = mysqli_num_rows($result);
                    echo "<h3>$count</h3>";
                ?>  
                <span class="widget-title">PATIENTS <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="text"><h1>WELCOME <?php echo $_SESSION['admin']; ?></h1></div>
<div class="img-container">
    <img src="img/docc.jpg" alt="Doctor Image" class="img-fluid" />
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
