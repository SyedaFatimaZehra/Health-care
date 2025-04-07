<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HEALTH CARE - Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-img-wrap {
            position: relative;
            margin-bottom: 20px;
        }

        .profile-img-wrap img {
            border-radius: 10px;
            width: 100%;
            height: auto;
        }

        .fileupload {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            background-color: #0056b3;
        }

        .form-group label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php');
    include('sidebar.php');
    include('../db_conn.php');
    
    if (!isset($_SESSION['doctor']) || !isset($_SESSION['email'])) {
        echo "<script>location.assign('../login.php');</script>";
    }
    
    $id = $_GET['id'];
    $query = "SELECT * FROM doctors WHERE doctor_id = $id";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
            <div class="page-wrapper">
                <div class="content">
                    <h4 class="page-title">Edit Profile</h4>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="profile-img-wrap">
                                            <img class="img-fluid" src="../admin/img/<?php echo $data['profile_pic'] ?>" alt="User Image">
                                            <div class="fileupload btn btn-secondary">
                                                <span class="btn-text">Edit</span>
                                                <input type="file" name="pic" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Gender:</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="male" <?php echo ($data['gender'] == 'male') ? 'checked' : '' ?>>
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="female" <?php echo ($data['gender'] == 'female') ? 'checked' : '' ?>>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="card-title">Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['doctor_name'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="specialization">Specialization</label>
                                            <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $data['specialization'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $data['experience'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="hospital_affiliation">Hospital Affiliation</label>
                                            <input type="text" class="form-control" id="hospital_affiliation" name="hospital_affiliation" value="<?php echo $data['hospital_affiliation'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select class="form-control" name="city" id="city" required>
                                                <?php
                                                $query2 = "SELECT * FROM cities";
                                                $result2 = mysqli_query($db, $query2);
                                                foreach ($result2 as $data2) {
                                                    $selected = ($data2['city_id'] == $data['city_id']) ? 'selected' : '';
                                                    echo "<option value=\"{$data2['city_id']}\" $selected>{$data2['city_name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo $data['phone'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['address'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary" name="update" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
    }
    ?>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $hospitalaffiliation = $_POST['hospital_affiliation'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $pic = $_FILES['pic']['name'];
    $tempname = $_FILES['pic']['tmp_name'];
    
    if (!empty($pic)) {
        $uploadDir = "../admin/img/";
        

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['pic']['type'], $allowedTypes) && $_FILES['pic']['size'] <= 2 * 1024 * 1024) {
            if (move_uploaded_file($tempname, $uploadDir . $pic)) {
                // Successfully uploaded the image
                $imageUpdate = ", profile_pic='$pic'";
            } else {
                echo "<script>alert('Image upload failed');</script>";
                $imageUpdate = "";
            }
        } else {
            echo "<script>alert('Invalid file type or size exceeds 2MB.');</script>";
            $imageUpdate = "";
        }
    } else {

        $imageUpdate = "";
    }

    // Update profile without the image if not updated
    $query = "UPDATE doctors SET doctor_name='$name', gender='$gender', specialization='$specialization', experience='$experience', hospital_affiliation='$hospitalaffiliation', city_id='$city', email='$email', phone='$phonenumber', address='$address', password='$password' $imageUpdate WHERE doctor_id=$id";
    
    $result = mysqli_query($db, $query);
    if ($result) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script>location.assign('profile.php?id=$id');</script>";
    } else {
        echo "<script>alert('Failed to update profile');</script>";
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
