    <!DOCTYPE html>
    <html lang="en">


    <!-- profile22:59-->
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
        $query= "SELECT * FROM `admin` WHERE email = '".$_SESSION['email']."'";
        $final=mysqli_query($db,$query);
        $data = mysqli_fetch_assoc($final);
    
        ?>

        <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-7 col-6">
                            <h4 class="page-title">My Profile</h4>
                        </div>

                        <div class="col-sm-5 col-6 text-right m-b-30">
                            <a href="edit-profile.php?id=<?php echo $data ['admin_id'] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                        </div>
                    </div>
                    <div class="card-box profile-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img src="<?php echo $data ['profile_pic'] ?>" alt="" class="avatar"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0" name="name"><?php echo $data ['admin_name'] ?></h3>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                <li>
                                                        <span class="title">Gender:</span>
                                                        <span class="text"name="gender"><?php echo $data ['gender'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Email:</span>
                                                        <span class="text"name="email"><?php echo $data ['email'] ?></span>
                                                    </li>
                                                    
                                                    <li>
                                                        <span class="title">Phone:</span>
                                                        <span class="text" name="phone_number"><?php echo $data ['phone'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Address:</span>
                                                        <span class="text" name="address"><?php echo $data ['address'] ?></span>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                    <?php
                    if(isset($_POST['update'])){
                        $name = $_POST['name'];
                        $gender = $_POST['gender'];
                        $email = $_POST['email'];
                        $phonenumber = $_POST['phone_number'];
                        $address = $_POST['address'];
                        $pic= $_FILES[ 'pic'][' name '];
                        $pictemp= $_FILES[ 'pic']['tmp_ name'];
                        $imgfolder="img/";
                        move_uploaded_file($pictemp, $imgfolder.$pic);
                        $Query = "SELECT * FROM `admin`";
                        $result = mysqli_query($db,$Query);
                    }
    ?>

        <div class="sidebar-overlay" data-reff=""></div>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/app.js"></script>
    </body>


    <!-- profile23:03-->
    </html>

    <!-- Create table admin (
        admin_id int primary key auto_increment,
        admin_name varchar(50),
        profile_pic varchar(200),
        gender varchar(50),
        email varchar(50),
        phone varchar(50),
        address varchar(200),
        password varchar(50)
        
        ) -->