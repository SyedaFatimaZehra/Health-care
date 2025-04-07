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
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .form-control {
            height: 45px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php');
    include('sidebar.php');
    include('session_destroy.php');
    include('../db_conn.php');

    $id = $_GET['id'];
    $query = "SELECT * FROM patients WHERE patient_id=$id";
    $result = mysqli_query($db, $query);
    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Edit Profile</h4>
                        </div>
                    </div>
                    <form method="post">
                        <div class="card card-box">
                            <h3 class="card-title">Basic Information</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $data['patient_name'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input type="radio" name="gender" value="male" <?php echo ($data['gender'] == 'male') ? 'checked' : '' ?>> Male
                                        <input type="radio" name="gender" value="female" <?php echo ($data['gender'] == 'female') ? 'checked' : '' ?>> Female
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-box">
                            <h3 class="card-title">Contact Information</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter new password (if changing)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo $data['phone'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-box">
                            <h3 class="card-title">Medical History</h3>
                            <div class="form-group">
                                <textarea class="form-control" name="medical_history" rows="4" required><?php echo $data['medical_history'] ?></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary submit-btn" name="update" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
    <?php
        }
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phone_number'];
        $address = $_POST['address'];
        $medical_history = $_POST['medical_history'];
        $password = $_POST['password'];

        // Update patient data
        $Uquery = "UPDATE patients SET patient_name='$name',gender='$gender',email='$email',phone='$phonenumber',address='$address',medical_history='$medical_history',password='$password' WHERE patient_id=$id";
        $result = mysqli_query($db, $Uquery);


        if ($result) {
            echo "<script>alert('Data updated successfully'); window.location.href='profile.php';</script>";
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
</body>

</html>
