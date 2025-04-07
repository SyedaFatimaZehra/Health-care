<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health - Medical</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/tooplate-style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f8f9fa;
        }
        #appointment {
            width: 100%;
            max-width: 600px; /* Set a max width for the form */
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            margin-bottom: 20px;
        }
                /* Increase label font size */
        label {
            font-size: 1.5rem; /* Adjust the font size as needed */
            font-weight: bold; /* Optional: make the labels bold */
        }
        textarea{
            resize: none; /* Disable textarea resizing */
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
$fetch = "SELECT * FROM doctors WHERE doctor_id=$id";
$result = mysqli_query($db, $fetch);
$data = mysqli_fetch_assoc($result);
?>

<section id="appointment" data-stellar-background-ratio="3" style="margin-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h2>Make an Appointment</h2>
                    </div>
                    <h1>Doctor: <span><?php echo htmlspecialchars($data['doctor_name']); ?></span></h1>

                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <div class="form-group">
                            <label for="name">Patient Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Select Day</label>
                            <select class="form-control" id="date" name="date" required>
                                <option value="">Select a day</option>
                                <?php
                                $days = explode(',', $data['available_days']);
                                foreach ($days as $day) {
                                    echo "<option value=\"" . htmlspecialchars(trim($day)) . "\">" . htmlspecialchars(trim($day)) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Select Time</label>
                            <select class="form-control" id="time" name="time" required>
                                <option value="">Select a time</option>
                                <?php
                                $times = explode(',', $data['available_time']);
                                foreach ($times as $time) {
                                    echo "<option value=\"" . htmlspecialchars(trim($time)) . "\">" . htmlspecialchars(trim($time)) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        </div>

                        <div class="form-group">
                            <label for="medical">Medical History</label>
                            <textarea class="form-control" rows="5" id="medical" name="medical" placeholder="Type..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" id="cf-submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $appointment_date = mysqli_real_escape_string($db, $_POST['appointment_date']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $medical = mysqli_real_escape_string($db, $_POST['medical']);

    // Check if the patient already exists
    $check_patient_query = "SELECT patient_id FROM patients WHERE email = '$email'";
    $check_result = mysqli_query($db, $check_patient_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        // Patient exists
        $patient = mysqli_fetch_assoc($check_result);
        $patient_id = $patient['patient_id'];
    } else {
        // Insert new patient
        $patient_query = "INSERT INTO patients (patient_name, email, phone, medical_history) VALUES ('$name', '$email', '$phone', '$medical')";
        if (mysqli_query($db, $patient_query)) {
            $patient_id = mysqli_insert_id($db); // Get the new patient's ID
        } else {
            echo "<script>alert('Failed to create patient record');</script>";
            exit;
        }
    }

    // Insert appointment
    $app_query = "INSERT INTO appointments (doctor_id, patient_id, appointment_date, appointment_time) VALUES ('$id', '$patient_id', '$appointment_date', '$time')";
    $result = mysqli_query($db, $app_query);

    if ($result) {
        echo "<script>alert('Appointment Booked Successfully');</script>";
    } else {
        echo "<script>alert('Appointment Booking Failed');</script>";
    }
}
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
