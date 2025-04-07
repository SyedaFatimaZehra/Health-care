<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Data Table CSS -->
  <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
  <style>
    .wrapper {
      margin-top: 5vh;
    }

    .dataTables_filter {
      float: right;
    }

    .table-hover > tbody > tr:hover {
      background-color: #ccffff;
    }

    thead {
      background: #ddd;
    }

    /* Ensure the table is centered and responsive */
    .table {
      margin: 0 auto; /* Center the table */
    }

    @media (max-width: 767px) {
      /* Responsive styles for small screens */
      .table thead {
        display: none; /* Hide the header on small screens */
      }

      .table tr {
        display: block; /* Make rows block elements */
        margin-bottom: 15px; /* Space between rows */
      }

      .table td {
        display: flex; /* Flexbox for labels */
        justify-content: space-between; /* Space out label and value */
        padding: 10px; /* Padding for better touch targets */
        border: none; /* Remove borders */
        position: relative; /* For pseudo-elements */
      }

      .table td::before {
        content: attr(data-label); /* Use data-label attribute for responsive design */
        font-weight: bold; /* Bold label */
        margin-right: 10px; /* Space between label and value */
      }
    }
  </style>
</head>
<body>
  <?php
  include('../db_conn.php');
  include('navbar.php');
  include('sidebar.php');
  if(!isset($_SESSION['patient']) || !isset($_SESSION['email'])){
    echo "<script>
    location.assign('../login.php');
    </script>";
  }
  $id = $_SESSION['email'];
  $fetch = "SELECT * FROM doctors INNER JOIN cities ON doctors.city_id = cities.city_id";
  $result = mysqli_query($db, $fetch);
  if(mysqli_num_rows($result) > 0){
  ?>
  <div class="container wrapper" style="margin-top: 100px;">
    <div class="row justify-content-end">
      <div class="col-md-10">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Doctor Name</th>
              <th>Specialization</th>
              <th>City</th>
              <th>Experience</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($data = mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td data-label='Doctor Name'>".$data['doctor_name']."</td>";
              echo "<td data-label='Specialization'>".$data['specialization']."</td>";
              echo "<td data-label='City'>".$data['city_name']."</td>";
              echo "<td data-label='Experience'>".$data['experience']."</td>";
              echo "<td data-label='Email'>".$data['email']."</td>";
              echo "<td data-label='Phone'>".$data['phone']."</td>";
              echo "<td data-label='Action'><a href='appointment.php?id=".$data['doctor_id']."' class='btn btn-primary'>Book</a></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  } else {
    echo "<script>
    alert('No doctors found');
    </script>";
  }
  ?>
</body>
</html>
<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true, // Enable responsive
      columnDefs: [
        { "orderable": false, "targets": 6 } // Disable sorting on the last column
      ],
      language: {
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    });
  });
</script>
