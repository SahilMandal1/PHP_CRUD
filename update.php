<?php 
    include('connection.php');

    if(isset($_GET['update_id'])) {
        $update_id = $_GET['update_id'];

        // select query
        $select_query = "SELECT * FROM `details` WHERE user_id=$update_id";
        $result_query = mysqli_query($con, $select_query);
        $row_data = mysqli_fetch_assoc($result_query);

        $name = $row_data['name'];
        $email = $row_data['email'];
        $mobile = $row_data['mobile'];
    }
    
    if(isset($_POST['update_data'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // update query 
        $update_query = "UPDATE `details` SET `name`='$name',`email`='$email',`mobile`='$mobile' WHERE user_id=$update_id";
        $update_result = mysqli_query($con, $update_query);

        if($update_query) {
            echo "<script>alert('Data Updated Successfully!');</script>";
            echo "<script>window.open('display.php', '_self');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post" class="w-50 m-auto">
            <div class="form-outline mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $name;?>" required>
            </div>
            <div class="form-outline mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?php echo $email;?>" required>
            </div>
            <div class="form-outline mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile" value="<?php echo $mobile;?>" required>
            </div>
            <div class="text-center mt-4">
                <input type="submit" name="update_data" value="Update" class="btn btn-dark px-4 rounded-0 mx-2">
                <button class="btn btn-primary px-4 rounded-0"><a href="display.php" class="text-white text-decoration-none">View Details</a></button>
            </div>
        </form>
    </div>
</body>
</html>