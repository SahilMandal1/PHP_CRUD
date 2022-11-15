<?php 
    include('connection.php');

    if(isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        $delete_query = "DELETE FROM `details` WHERE user_id=$delete_id";
        $delete_result = mysqli_query($con, $delete_query);

        if($delete_result) {
            echo "<script>alert('Data Deleted Successfully');</script>";
            echo "<script>window.open('display.php', '_self');</script>";
        }
    }
?>