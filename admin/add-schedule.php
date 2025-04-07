<!DOCTYPE html>
<html lang="en">


<!-- add-schedule24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<title>HEALTH CARE</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<?php
    include('../db_conn.php');
    include('navbar.php');
    include('sidebar.php');
    // include ('session_destroy.php');

    if(isset( $_POST['submit'])){
        $name =$_POST['name'];
        $days =$_POST['days'];
        $time =$_POST['time'];
        $query= "INSERT INTO `doctors`(`doctor_name`,`available_days`,`available_time`) VALUES ('$name','$days','$time')";
        $final=mysqli_query($db,$query);
        if($final){
            echo "<script>alert('data inserted')</script>";
            header("location: schedule.php");
        }
    }
    ?>


    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Schedule</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Doctor Name</label>
										<input type="text"name="name">
									</div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Available Days</label>
										<select class="select" name="days">
											<option value="sunday">Sunday</option>
											<option value="monday">Monday</option>
											<option value="tuesday">Tuesday</option>
											<option value="wednesday">Wednesday</option>
											<option value="thursday">Thursday</option>
											<option value="friday">Friday</option>
											<option value="saturday">Saturday</option>
										</select>
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3"name="time">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit" name="submit">Create Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
				$('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });
     </script>
</body>


<!-- add-schedule24:07-->
</html>
