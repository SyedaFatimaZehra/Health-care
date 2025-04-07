<!DOCTYPE html>
<html lang="en">


<!-- edit-patient24:07-->
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
    

?>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        // echo $id;
                        $query = "Select * FROM patients Where patient_id = '$id'";
                        $result = mysqli_query($db,$query);
                        while($data = mysqli_fetch_assoc($result)){        
     ?>
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                        <label>Patient Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="<?php echo $data['patient_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                            <div class="form-group form-focus select-focus">
                                                <label >Gender</label>
                                                <input type="radio" name="gender" value="male" <?php echo($data['gender']) == 'male' ? 'checked' : '' ?>>
                                                <label for="male">MALE</label>
                                                <input type="radio" name="gender" value="female" <?php echo($data['gender']) == 'female' ? 'checked' : '' ?>>
                                                <label for="female">FEMALE</label>
                                            </div>
                                        </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email"name="email" value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone" value="<?php echo $data['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" name="address"type="text"value="<?php echo $data['address'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Medical History</label>
                                        <input class="form-control" type="text" name="medical"value="<?php echo $data['medical_history'] ?>">
                                    </div>
                                </div>
										
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit"name="update">Save</button>
                            </div>
                        </form>
                        <?php 
                        } 
                        } 
                        
                        ?>
                    </div>
                </div>
            </div>
			<?php
            if(isset( $_POST['update'])){
                $name =$_POST['name'];
                $gender =$_POST['gender'];
                $email =$_POST['email'];
                $phone =$_POST['phone'];
                $address =$_POST['address'];
                $medical =$_POST['medical'];
                $query = "UPDATE `patients` SET `patient_name`='$name',`gender`='$gender',`email`='$email',`phone`='$phone',`address`='$address',`medical_history`='$medical' WHERE patient_id=$id";
                $result = mysqli_query($db, $query);
                if($result){
                    echo "<script> 
                    alert('Patient Updated Successfully')
                    window.location.href='patients.php';
                    </script>";
                    
                }else{
                    echo "<script> alert('Patient Not Updated')</script>";
                }
                }
            ?>
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


<!-- edit-patient24:07-->
</html>
