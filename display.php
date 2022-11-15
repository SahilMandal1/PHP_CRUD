<?php 
    include('connection.php');
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

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="container my-5">
        <a href="index.php" class="btn btn-dark text-white rounded-0 px-3">Add User</a>

        <table class="table table-bordered mt-5">
                <?php 
                    // select query
                    $select_data = "SELECT * FROM `details`";
                    $result_data = mysqli_query($con, $select_data);
                    $number = 1;
                    $num_of_rows = mysqli_num_rows($result_data);

                    if($num_of_rows > 0) {
                    ?>
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Operations</th>
                        </tr>
                        </thead>

                    <tbody>
                    <?php

                    while($row_data = mysqli_fetch_assoc($result_data)) {
                        $user_id = $row_data['user_id'];
                        $name = $row_data['name'];
                        $email = $row_data['email'];
                        $mobile = $row_data['mobile'];

                        echo "<tr>
                        <td>$number</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$mobile</td>
                        <td class='text-center'>
                            <button class='btn btn-dark rounded-0 py-1 mx-2'><a href='update.php?update_id=$user_id' class='text-white text-decoration-none'>Update</a></button>
                            <button class='btn btn-danger rounded-0 py-1'><a href='delete.php?delete_id=$user_id' class='text-white text-decoration-none'>Delete</a></button>  
                        </td>
                    </tr>";
                    $number++;
                    }} else {
                        echo "<h2 class='text-center text-danger mt-4'>No Data Added Yet!</h2>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>