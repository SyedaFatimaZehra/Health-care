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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
<?php
    include('../db_conn.php');
    include('navbar.php');
    include('sidebar.php');
?>

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Appointments</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "
                                SELECT a.appointment_id, p.patient_name, d.doctor_name, 
                                       a.appointment_date, a.appointment_time, a.status 
                                FROM appointments a
                                INNER JOIN patients p ON a.patient_id = p.patient_id
                                INNER JOIN doctors d ON a.doctor_id = d.doctor_id
                            ";
                            $result = mysqli_query($db, $query);
                            if ($result) {
                                while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($data['appointment_id']); ?></td>
                                        <td><?php echo htmlspecialchars($data['patient_name']); ?></td>
                                        <td><?php echo htmlspecialchars($data['doctor_name']); ?></td>
                                        <td><?php echo htmlspecialchars($data['appointment_date']); ?></td>
                                        <td><?php echo htmlspecialchars($data['appointment_time']); ?></td>

                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='7'>No appointments found.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
