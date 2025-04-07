<!DOCTYPE html>
<html lang="en">


<!-- schedule23:20-->
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
include('../db_conn.php');
include('navbar.php');
include('sidebar.php');
// if(!isset($_SESSION['name']) || !isset($_SESSION['email'])){
// 	// header('location: ../login.php');
// 	echo "<script>
// 		location.assign('../login.php');
// 	</script>";
// }
  ?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
					<?php 						
						$query = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
						$result = mysqli_query($db,$query);
						$data = mysqli_fetch_assoc($result);
					?>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Available Days</th>
										<th>Available Time</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php   
                                    // $id= $_GET[''];
									// $query= "SELECT * FROM doctors";
									// include('../db_conn.php');
                                    //   $result= mysqli_query($db,$query);
                                    //   foreach($result as $data){
                                    ?>
									<tr>
										<td><?php echo $data['available_days']?></td>
										<td><?php echo $data['available_time']?></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<!-- <a class="dropdown-item" href="edit-schedule.php?id="><i class="fa fa-pencil m-r-5"></i> Edit</a> -->
													<a href="edit-schedule.php?id=<?php echo $data['doctor_id']?>" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a> 
													<a href="delete-schedule.php?id=<?php echo $data['doctor_id']?>"class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_schedule"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<?php
                                    // }
                                    ?>
								</tbody>
							</table>
						</div>
                </div>
                </div>
            </div>
			<?php
if (isset($_POST['submit'])) { 
	$days = $_POST['days'];
	$time = $_POST['time'];
	$Query = "SELECT * FROM doctors";
	$result = mysqli_query($db,$Query);
}

			?>
		<div id="delete_schedule" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Schedule?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>

						</div>
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
</body>


<!-- schedule23:21-->
</html>