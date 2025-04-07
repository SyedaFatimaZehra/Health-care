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
    include('navbar.php');
    include('sidebar.php');
    include('../db_conn.php');
    
    // Redirect to login if session is not set
    if (!isset($_SESSION['doctor']) || !isset($_SESSION['email'])) {
        echo "<script>location.assign('../login.php');</script>";
    }

    // Handle appointment removal
    if (isset($_POST['remove_appointment'])) {
        $appointment_id = intval($_POST['appointment_id']);
        $delete_query = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
        mysqli_query($db, $delete_query);
        echo "<script>alert('Appointment removed successfully.');</script>";
    }

    // Handle appointment status updates
    if (isset($_POST['update_appointment'])) {
        $appointment_id = intval($_POST['appointment_id']);
        $status = $_POST['status'];

        $update_query = "UPDATE appointments SET status = '$status' WHERE appointment_id = $appointment_id";
        mysqli_query($db, $update_query);
        echo "<script>alert('Appointment status updated to $status successfully.');</script>";
    }
?>
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    // Fetch appointment data
    $query = "
        SELECT a.appointment_id, p.patient_name, d.doctor_name, 
               a.appointment_date, a.appointment_time, a.status 
        FROM appointments a
        JOIN patients p ON a.patient_id = p.patient_id
        JOIN doctors d ON a.doctor_id = d.doctor_id
        WHERE d.email = '$_SESSION[email]'
        ORDER BY a.appointment_date DESC
    ";

    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo htmlspecialchars($row['appointment_id']); ?></td>
            <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
            <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
            <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
            <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($row['appointment_id']); ?>">
                    <select name="status" class="form-control d-inline" style="width: auto; display: inline-block;" required>
                        <option value="Pending" <?php echo $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="Approved" <?php echo $row['status'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                        <option value="Completed" <?php echo $row['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    </select>
                    <button type="submit" name="update_appointment" class="btn btn-success btn-sm ml-2">Update</button>
                    <button type="submit" name="remove_appointment" class="btn btn-danger btn-sm ml-2">Remove</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>

                    </table>
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
