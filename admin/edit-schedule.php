<!DOCTYPE html>
<html lang="en">


<!-- edit-schedule24:07-->
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

<body>
<?php
    include('navbar.php');
    include('sidebar.php');
    include('../db_conn.php');
    // include ('session_destroy.php');
      ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Schedule</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <?php 
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM doctors WHERE doctor_id = '$id'";
                                    $result = mysqli_query($db,$query);
                                    // $data = mysqli_fetch_array($result);
                                    if ($result) {
                                        $data = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-md-6">
                                <label class="focus-label">Name</label>
                               <input type="text" readonly class="form-control floating" name="name"  value="<?php echo $data['doctor_name']?>">
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Available Days</label>
										<select class="form-control" name="days">
                                            <option value="Monday,Wednesday,Friday">Monday,Wednesday,Friday</option>
                                            <option value="Tuesday,Thursday,Saturday">Tuesday,Thursday,Saturday</option>
                                            <option value="Monday,Wednesday,Friday,Saturday">Monday,Wednesday,Friday,Saturday</option>
                                            <option value="Monday,Tuesday,Wednesday,Thursday,Friday">Monday,Tuesday,Wednesday,Thursday,Friday</option>
                                            <option value="Monday,Tuesday,Wednesday,Thursday,Friday,Saturday">Monday,Tuesday,Wednesday,Thursday,Friday,Saturday</option>   
                                        </select>
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <select class="form-control" name="time">
                                            <option value="9:00 AM - 11:00 AM">9:00 AM - 11:00 AM</option>
                                            <option value="11:00 AM - 1:00 PM">11:00 AM - 1:00 PM</option>
                                            <option value="1:00 PM - 3:00 PM">1:00 PM - 3:00 PM</option>
                                            <option value="3:00 PM - 5:00 PM">3:00 PM - 5:00 PM</option>
                                            <option value="5:00 PM - 7:00 PM">5:00 PM  - 7:00 PM</option>
                                            <option value="7:00 PM - 9:00 PM">7:00 PM - 9:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
             }
            }
              
            ?>
           <?php
        if (isset($_POST['submit'])) { 
            $name=$_POST['name'];
            $days = $_POST['days'];
            $time = $_POST['time'];
            $query= "UPDATE `doctors` SET `doctor_name`='$name',`available_days`='$days',`available_time`='$time' WHERE doctor_id = '$id'";
            $result= mysqli_query($db,$query);
            if($result){
                echo "<script>alert('Schedule Updated Successfully')
                 window.location.href='schedule.php'</script>";
            }else{
                echo "<script>alert('Failed to Update Schedule')
                 window.location.href='edit-schedule.php'</script>";
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
	    <script src="assets/js/app.js"></script>
		<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
	 <script>
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>


<!-- edit-schedule24:07-->
</html>
