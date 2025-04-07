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
    if(!isset($_SESSION['doctor']) || !isset($_SESSION['email'])){
	
        echo "<script>
            location.assign('../login.php');
        </script>";
	}
    $id = $_SESSION['email'];
    echo "<script>
        console.log('".$id."');
    </script>";
    $fetch = "SELECT * FROM doctors WHERE email = '$id'";
    $city = "SELECT * FROM cities";
    $result = mysqli_query($db,$fetch);
    $city_result = mysqli_query($db,$city);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        $city_data = mysqli_fetch_assoc($city_result);
    
      ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-profile.php?id=<?php echo $data['doctor_id'] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img" name="pic">
                                      <img class="avatar" src="../admin/img/<?php echo $data['profile_pic']?>" alt="">
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0" name="name"><?php echo $data['doctor_name']?></h3>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text" name="phone_number"><?php echo $data['phone']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text" name="email"><?php echo $data['email']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">specialization:</span>
                                                    <span class="text" name="specialization"><?php echo $data['specialization']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Experience:</span>
                                                    <span class="text" name="experience"><?php echo $data['experience']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">hospital affiliation:</span>
                                                    <span class="text" name="hospital_affiliation"><?php echo $data['hospital_affiliation']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">city:</span>
                                                    <span class="text" name="city"><?php echo $city_data['city_name']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text" name="address"><?php echo $data['address']?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text" name="gender"><?php echo $data['gender']?></span>
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
                <?php
    }
            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $specialization = $_POST['specialization'];
                $experience = $_POST['experience'];
                $hospitalaffiliation = $_POST['hospital_affiliation'];
                $city = $_POST['city'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phone_number'];
                $address = $_POST['address'];
                $pic= $_FILES['pic']['name'];
                $pictemp= $_FILES['pic']['tmp_name'];
                $imgfolder= "images/";
                move_uploaded_file($pictemp,$imgfolder.$pic);
                $Query = "SELECT * FROM doctors";
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