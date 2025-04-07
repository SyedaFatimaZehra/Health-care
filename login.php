<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <!-- <link rel="stylesheet" type="text/css" href="./css/animate.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/font-awesome">
    <link rel="stylesheet" type="text/css" href="./css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="./css/tooplate-style.css"> -->
    <link rel="stylesheet" type="text/css" href="./formcss/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./formcss/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./formcss/style.css">
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form method="post" class="form-signin">

                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" name="email_username"class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.php">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="login" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.php">Register Now</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <?php
    include('db_conn.php');
      if(isset($_POST['login'])){
        $email_username= $_POST['email_username'];
        $password= $_POST['password'];
        $checkQ = "SELECT * FROM user WHERE username = '$email_username' OR email= '$email_username'";
        $checkpateintpass = "SELECT * FROM patients WHERE password = '$password'";
        $doctor_pass = "SELECT * FROM doctors WHERE password = '$password'";
        $admin_pass = "SELECT * FROM admin WHERE password = '$password'"; 
        $result= mysqli_query($db, $checkQ);
        $patient_query= mysqli_query($db, $checkpateintpass);
        $doctor_query= mysqli_query($db, $doctor_pass);
        $admin_query= mysqli_query($db, $admin_pass);
        $p_pass_fetch = mysqli_fetch_assoc($patient_query);
        $d_pass_fetch = mysqli_fetch_assoc($doctor_query);
        $a_pass_fetch = mysqli_fetch_assoc($admin_query);
        if(mysqli_num_rows($result)>0){
            if($result_fetch2 = mysqli_fetch_assoc($result)){
                if($p_pass_fetch['password']==$password){
                        if($result_fetch2['usertype']== 'p'){
                          if($result_fetch2['username'] || $result_fetch2['email']){
                              session_start();
                              $_SESSION['patient'] = $result_fetch2['username'];
                              $_SESSION['email'] = $result_fetch2['email'];
                              echo "<script> alert('$result_fetch2[username] Logged In Successfully')
                              window.location.href= 'patient/index.php' </script>";
                          }
                      }        
              }
              if($d_pass_fetch['password']==$password){
                  if($result_fetch2['usertype']== 'd'){
                      if($result_fetch2['username'] || $result_fetch2['email']){
                          session_start();
                          $_SESSION['doctor'] = $result_fetch2['username'];
                          $_SESSION['email'] = $result_fetch2['email'];
                          echo "<script> alert('$result_fetch2[username] Logged In Successfully') 
                          window.location.href= 'doctor/index.php' </script>";
                      }
                  }
              }
              if($a_pass_fetch['password']==$password){
                  if($result_fetch2['usertype']== 'a'){
                      if($result_fetch2['username'] || $result_fetch2['email']){
                          session_start();
                          $_SESSION['admin'] = $result_fetch2['username'];
                          $_SESSION['email'] = $result_fetch2['email'];
                          echo "<script> alert('$result_fetch2[username] Logged In Successfully')
                          window.location.href= 'admin/index.php' </script>";
                      }
                  }
              }
              else{
                  echo "<script> alert('PASSWORD IS INCORRECT.')
                  window.location.href='login.php' </script>";
                }
                }
          }
          else{
              echo "<script> alert('USER DOES NOT EXIST.')
                  window.location.href='register.php' </script>";
                  
          }
          }
            ?>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>