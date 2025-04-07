<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Edit Medicine - Healthcare</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, .5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

<?php
include('../db_conn.php');
include('navbar.php');
include('sidebar.php');

$id = $_GET['id'];
$query = "SELECT * FROM `medicalnews` WHERE news_id = $id";
$result = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result);
?>

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Medical News</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>News Title</label>
                            <input class="form-control" type="text" name="title" value="<?php echo $data['news_title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>News Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" required><?php echo htmlspecialchars($data['news_content']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Select Date</label>
                            <input type="date" name="date" class="form-control" required value="<?php echo htmlspecialchars($data['publication_date']); ?>">
                        </div>
                        <div class="form-group">
                            
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" name="update" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if (isset($_POST['update'])) {
    $name = $_POST['title'];
    $content = $_POST['content'];
    $publication = $_POST['date'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $path = "img/" . $image;
    move_uploaded_file($tmp_name, $path);

    $query = "UPDATE `medicalnews` SET med_image = '$image', news_title = '$name', news_content = '$content', publication_date = '$publication' WHERE news_id = $id";
    $final = mysqli_query($db, $query);
    if ($final) {
        echo "<script> 
                alert('Medical news updated successfully');
                window.location.href = 'medical-news.php';
              </script>";
    } else {
        echo "<script>alert('Error updating news. Please try again.');</script>";
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
