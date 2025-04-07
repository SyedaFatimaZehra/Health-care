<!DOCTYPE html>
<html lang="en">


<!-- edit-profile23:03-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
</head>

<body>
    <?php
    include('../db_conn.php');
    include('navbar.php');
    include('sidebar.php');
    // include ('session_destroy.php');

    $id = $_GET['id'];
    $query = "SELECT * FROM `admin` WHERE admin_id=$id";
    $result = mysqli_query($db, $query);
    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
    ?>

            <div class="main-wrapper">
                <div class="page-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Edit Profile</h4>
                            </div>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-box">
                                <h3 class="card-title">Basic Informations</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap">
                                            <img src="<?php echo $data['profile_pic'] ?>" class="inline-block" alt="">
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="" type="file" name="pic" value="<?php echo $data['profile_pic'] ?>">
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"> NAME</label>
                                                        <input type="text" class="form-control floating" name="name" value="<?php echo $data['admin_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus select-focus">
                                                        <label for="">GENDER:</label><br><br>
                                                        <input type="radio" name="gender" value="male" <?php echo ($data['gender']) == 'male' ? 'checked' : '' ?>>
                                                        <label for="male">MALE</label>
                                                        <input type="radio" name="gender" value="female" <?php echo ($data['gender']) == 'female' ? 'checked' : '' ?>>
                                                        <label for="female">FEMALE</label><br><br>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">EMAIL</label>
                                                        <input type="email" class="form-control floating" name="email" value="<?php echo $data['email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class=" form-group form-focus">
                                                        <label class="focus-label">PHONE NUMBER</label>
                                                        <input type="text" class="form-control floating" name="phone_number" value="<?php echo $data['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">address</label>
                                                        <input type="text" class="form-control floating" name="address" value="<?php echo $data['address'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">password</label>
                                                        <input type="text" class="form-control floating" name="password" value="<?php echo $data['password'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center m-t-20">
                                            <button class="btn btn-primary submit-btn" name="update" type="submit">Save</button>
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
            // if(isset($_POST['update'])){
            //     $name = $_POST['name'];
            //     $gender = $_POST['gender'];
            //     $email = $_POST['email'];
            //     $phone_number = $_POST['phone_number'];
            //     $address = $_POST['address'];
            //     $password = $_POST['password'];
            //     // $profile_pic = $_FILES['pic']['name'];
            //     // $profile_tmp = $_FILES['pic']['tmp_name'];
            //     // $imgfolder = "img".$profile_pic;
            //     // move_uploaded_file($profile_tmp,$imgfolder);
            //     $query= "UPDATE `admin` SET `admin_name`='$name',`gender`='$gender',`email`='$email',`phone`='$phone_number',`address`='$address',`password`='$password' WHERE admin_id=$id";
            //     $final=mysqli_query($db,$query);
            //     if($final){
            //         echo "<script>alert('profile updated successfully')
            //             window.location.href='profile.php';
            //         </script>
            //         ";
            //     }
            //     else{
            //         echo "<script>alert('profile not updated')
            //             window.location.href='profile.php';
            //         </script>
            //         ";
            //     }
            // }
            ?>
          
          <?php 
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Handle file upload
    if ($_FILES['pic']['name']) {
        $profile_pic = $_FILES['pic']['name'];
        $profile_tmp = $_FILES['pic']['tmp_name'];
        $imgfolder = "img/" . $profile_pic; // Adjust the folder as needed

        // Move the uploaded file
        move_uploaded_file($profile_tmp, $imgfolder);
    } else {
        // If no new image, keep the old one
        $query = "SELECT profile_pic FROM admin WHERE admin_id=$id";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);
        $imgfolder = $data['profile_pic']; // Use the existing image
    }

    // Update the database
    $query = "UPDATE `admin` SET `admin_name`='$name',`gender`='$gender',`email`='$email',`phone`='$phone_number',`address`='$address',`password`='$password', `profile_pic`='$imgfolder' WHERE admin_id=$id";
    $final = mysqli_query($db, $query);
    
    if ($final) {
        echo "<script>alert('Profile updated successfully'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Profile not updated'); window.location.href='profile.php';</script>";
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


<!-- edit-profile23:05-->

</html>