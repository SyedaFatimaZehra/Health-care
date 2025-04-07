<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="./formcss/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./formcss/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./formcss/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .account-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .account-box {
            padding: 30px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Set a max width for the form */
        }
        .account-logo img {
            max-width: 100%;
        }
        .form-group label {
            font-weight: bold;
        }
        .login-link {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <h1 class="mt-5 text-center">SIGNUP</h1>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="post" class="form-signin">
                        <div class="account-logo text-center">
                            <a href="doctor/index-2.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gender:</label><br>
                            <input type="radio" name="gender" value="male" required>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" required>
                            <label for="female">Female</label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox" required> I have read and agree to the Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" name="submit" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include ('db_conn.php');
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $gender = $_POST['gender'];
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        
        $query = "INSERT INTO patients (patient_name, gender, email, password, phone, address) VALUES ('$name', '$gender', '$email', '$password', '$phone', '$address')";
        $p_query = "INSERT INTO user (username, email, usertype) VALUES ('$name', '$email', 'p')";
        
        $final = mysqli_query($db, $query);
        $final2 = mysqli_query($db, $p_query);
        
        if($final && $final2){
            echo "<script>alert('Welcome $name, you have successfully registered'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Failed to add Patient'); window.location.href='register.php';</script>";
        }
    }
    ?>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
