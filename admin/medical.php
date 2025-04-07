<?php
include('../db_conn.php');

if (isset($_POST['submit'])) {
    $name =  $_POST['title'];
    $content =  $_POST['content'];
    $publication =  $_POST['date'];
    $med_image = $_FILES['image']['name'];
    $med_tmp = $_FILES['image']['tmp_name'];
    $imgfolder = "img/" . $med_image; 

    if (move_uploaded_file($med_tmp, $imgfolder)) {
        $query = "INSERT INTO `medicalnews` (`med_image`, `news_title`, `news_content`, `publication_date`) VALUES ('$med_image', '$name', '$content', '$publication')";
        
        $final = mysqli_query($db, $query);
        if ($final) {
            echo "<script>alert('Medical news inserted successfully');
                window.location.href='medical-news.php';
            </script>";
        } else {
            echo "<script>alert('Medical news not inserted');
                window.location.href='medical-news.php';
            </script>";
        }
    } else {
        echo "<script>alert('Image upload failed');
            window.location.href='medical-news.php';
        </script>";
    }
}
?>
