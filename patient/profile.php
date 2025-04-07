<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        .profile-header {
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .profile-detail {
            font-size: 1.1rem;
            margin: 10px 0;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <?php
        include('navbar.php');
        include('sidebar.php');
        include('../db_conn.php');
        include('session_destroy.php');
        $id = $_SESSION['email'];
        $fetch = "SELECT * FROM patients WHERE email = '$id'";
        $result = mysqli_query($db, $fetch);
        $data = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">My Profile</h4>
                </div>
                <div class="col-sm-5 col-6 text-right m-b-30">
                    <a href="edit-profile.php?id=<?php echo $data['patient_id'] ?>" class="btn btn-primary btn-rounded">
                        <i class="fa fa-pencil"></i> Edit Profile
                    </a>
                </div>
            </div>
            <div class="card card-box">
                <div class="card-header profile-header">
                    <h5 class="card-title">Profile Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Full Name:</strong>
                                    <span class="profile-detail"><?php echo $data['patient_name']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Phone:</strong>
                                    <span class="profile-detail"><?php echo $data['phone']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Email:</strong>
                                    <span class="profile-detail"><?php echo $data['email']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Address:</strong>
                                    <span class="profile-detail"><?php echo $data['address']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Gender:</strong>
                                    <span class="profile-detail"><?php echo $data['gender']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Medical History:</strong>
                                    <span class="profile-detail"><?php echo $data['medical_history']; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
