<!DOCTYPE html>
<html lang="en">

<!-- add-doctor24:06-->

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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="doc.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-focus select-focus">
                                        <label for="">Gender:</label><br><br>
                                        <input type="radio" name="gender" value="male" required>
                                        <label for="male">Male</label>
                                        <input type="radio" name="gender" value="female" required>
                                        <label for="female">Female</label><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="text" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input class="form-control" type="file" name="image" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Available Days</label>
                                        <select class="form-control" name="days" required>
                                            <option value="Monday,Wednesday,Friday">Monday,Wednesday,Friday</option>
                                            <option value="Tuesday,Thursday,Saturday">Tuesday,Thursday,Saturday</option>
                                            <option value="Monday,Wednesday,Friday,Saturday">Monday,Wednesday,Friday,Saturday</option>
                                            <option value="Monday,Tuesday,Wednesday,Thursday,Friday">Monday,Tuesday,Wednesday,Thursday,Friday</option>
                                            <option value="Monday,Tuesday,Wednesday,Thursday,Friday,Saturday">Monday,Tuesday,Wednesday,Thursday,Friday,Saturday</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <select class="form-control" name="time" required>
                                            <option value="9:00 AM - 11:00 AM">9:00 AM - 11:00 AM</option>
                                            <option value="11:00 AM - 1:00 PM">11:00 AM - 1:00 PM</option>
                                            <option value="1:00 PM - 3:00 PM">1:00 PM - 3:00 PM</option>
                                            <option value="3:00 PM - 5:00 PM">3:00 PM - 5:00 PM</option>
                                            <option value="5:00 PM - 7:00 PM">5:00 PM - 7:00 PM</option>
                                            <option value="7:00 PM - 9:00 PM">7:00 PM - 9:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City Name</label>
                                        <select class="form-control" name="city" required>
                                            <option value="">SELECT CITY</option>
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($db, $query);
                                            foreach ($result as $data) {
                                            ?>
                                                <option value="<?php echo $data['city_id'] ?>"><?php echo $data['city_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Affiliation<span class="text-danger"> *</span></label>
                                        <input class="form-control" type="text" name="affiliation" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input type="text" class="form-control" name="experience" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Specialization</label>
                                    <select class="form-control" name="specialization" required>
                                        <option value="">SELECT SPECIALIZATION</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Opthalmology">Opthalmology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Cancer Department">Cancer Department</option>
                                        <option value="ENT Department">ENT Department</option>
                                        <option value="Gynecology">Gynecology</option>
                                        <option value="Dermatology">Dermatology</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Dental">Dental</option>
                                        <option value="Diabetology">Diabetology</option>
                                        <option value="Endocrinology">Endocrinology</option>
                                        <option value="Gastroenterology">Gastroenterology</option>
                                        <option value="General Surgery">General Surgery</option>
                                        <option value="Hepatology">Hepatology</option>
                                        <option value="Nephrology">Nephrology</option>
                                        <option value="Nutrition & Dietetics">Nutrition & Dietetics</option>
                                        <option value="Oncology">Oncology</option>
                                        <option value="Pediatrics">Pediatrics</option>
                                        <option value="Physiotherapy">Physiotherapy</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                        <option value="Pulmonology">Pulmonology</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Rheumatology">Rheumatology</option>
                                        <option value="Urology">Urology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea style="resize: none;" rows="4" cols="50" class="form-control" name="address" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" type="submit">Create Doctor</button>
                            </div>
                        </form>
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
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker4').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</body>

<!-- add-doctor24:06-->

</html>
