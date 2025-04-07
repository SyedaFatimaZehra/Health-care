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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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

        }

        .img-responsive {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <?php
    include('../db_conn.php');
    include('navbar.php');
    include('sidebar.php');
    // session_start();
    if (!isset($_SESSION['doctor']) || !isset($_SESSION['email'])) {
        // header('location: ../login.php');
        echo "<script>
            location.assign('../login.php');
        </script>";
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
                            $query = "SELECT * FROM doctors";
                            $result = mysqli_query($db, $query);
                            $count = mysqli_num_rows($result);
                            if ($count == 0) {
                                echo "<h3>0</h3>";
                            } else {
                                echo "<h3>$count</h3>";
                            }
                            ?>
                            <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
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
                            if ($count == 0) {
                                echo "<h3>0</h3>";
                            } else {
                                echo "<h3>$count</h3>";
                            }
                            ?>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="welcome-text">
                <h1>WELCOME DOCTOR <br> <span><?php echo $_SESSION['doctor'] ?></span></h1>
            </div>
            <img src="img/med.jpg" alt="Medical Background" class="img-responsive">
      

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