<!DOCTYPE html>
<html lang="en">


<!-- doctors23:12-->
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
    // include ('session_destroy.php');


    ?>


<div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Medical News</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-med.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add News</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
                                        <th>Image</th>  
										<th>News Title</th>
										<th>News Content</th>
										<th>Publication Date</th>
										<th class="text-right">Action</th>
									</tr>

								</thead>

								<tbody>
                                <?php 

                                $query= "SELECT * FROM `medicalnews`";
                                $final=mysqli_query($db,$query);
                                foreach($final as $data){
                                    ?>
									<tr>
                                        <td><img src="img/<?php echo $data['med_image']?>" alt="" width="100px" height="100px"></td>
                                    <td><?php echo $data['news_title']?></td>
                                    <td><?php echo $data['news_content']?></td>
                                    <td><?php echo $data['publication_date']?></td>
                                    <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                    <a href="#"class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" ><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <!-- <a class="dropdown-item" href="edit-doctor.php?id="><i class="fa fa-pencil m-r-5"></i>Edit</a> -->
                                    <a href="edit-medicalnews.php?id=<?php echo $data['news_id']?>" class="dropdown-item"><i class="fa
                                    fa-pencil m-r-5"></i> Edit</a>
                                    <a href="delete-med.php?id=<?php echo $data['news_id']?>"class="dropdown-item" ><i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                    </div>
										
											</div>
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
</body>


<!-- doctors23:17-->
</html>