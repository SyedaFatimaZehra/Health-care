<!DOCTYPE html>
<html lang="en">


<!-- edit-doctor24:06-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
    // include ('session_destroy.php');

   
    ?>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM doctors Where doctor_id = $id ";
                        $result = mysqli_query($db, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-lg-8 offset-lg-2">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Doctor Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="name" value="<?php echo $data['doctor_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus select-focus">
                                                <label>Gender</label>
                                                <input type="radio" name="gender" value="male" <?php echo ($data['gender']) == 'male' ? 'checked' : '' ?>>
                                                <label for="male">MALE</label>
                                                <input type="radio" name="gender" value="female" <?php echo ($data['gender']) == 'female' ? 'checked' : '' ?>>
                                                <label for="female">FEMALE</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Hospital Affiliation <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="affiliation" value="<?php echo $data['hospital_affiliation'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City Name</label>
                                                    <?php
                                                    $query2 = "SELECT * FROM cities";
                                                    $result2 = mysqli_query($db, $query2);
                                                    ?>
                                                    <select class="form-control" name="city">
                                                        
                                                        <?php
                                                        foreach ($result2 as $data2) {
                                                        ?>  
                                                            <option value="<?php echo $data2['city_id'] ?>"><?php echo $data2['city_name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>


                                                </div>
                                            </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" name="email" type="email" value="<?php echo $data['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" name="phone" value="<?php echo $data['phone'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Specialization</label>
                                                <select class="form-control" name="specialization">
                                                    <option value="<?php echo $data['specialization'] ?>"><?php echo $data['specialization'] ?></option>
                                                    <option value="Neurology">Neurology</option>
                                                    <option value="Opthalmology">Opthalmology</option>
                                                    <option value="Orthopedics">Orthopedics</option>
                                                    <option value="Cancer Department">Cancer Department</option>
                                                    <option value="ENT Department">ENT Department</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea style="resize: none;" rows="4" cols="50" class="form-control" name="address"><?php echo $data['address'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="m-t-20 text-center">
                                            <button class="btn btn-primary submit-btn" type="submit" name="update">Save</button>
                                        </div>
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
                <?php  if (isset($_POST['update'])) {
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $affiliation = $_POST['affiliation'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $specialization = $_POST['specialization'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $query = "UPDATE doctors SET doctor_name='$name',gender='$gender',hospital_affiliation='$affiliation',email='$email',phone='$phone',specialization='$specialization',address='$address',city_id='$city' WHERE doctor_id = $id";
                    $result = mysqli_query($db, $query);
                    if ($result) {
                        echo "<script>alert('Data Updated Successfully')
                        window.location.href='doctors.php';
                        </script>";
                    } else {
                        echo "<script>alert('Data Not Updated')</script>";
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


<!-- edit-doctor24:06-->

</html>