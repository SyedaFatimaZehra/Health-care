 <?php 
  if(!isset($_SESSION['patient']) || !isset($_SESSION['email'])){
		// header('location: ../login.php');
        echo "<script>
            location.assign('../login.php');
        </script>";
	}