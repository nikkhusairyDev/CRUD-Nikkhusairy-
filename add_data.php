<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `crud` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`) 
    VALUES (NULL, '$first_name', '$last_name', '$email', '$phone_number', '$address')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=New record created successfully");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View table CRUD nikkhusairy</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
</body>
   
    <div class="wrapper">
        <form action="table.php" method="post" style="">

            <h1>Create New Customer</h1>

                <div class="input-box" >
                    <input type="text"  placeholder="First Name" name= "first_name" required>
                <i class='bx bxs-user-circle'></i>
                </div>
                
                <div class="input-box" >
                    <input type="text"  placeholder="Last Name" name="last_name" required>
                </div>

                <div class="input-box" >
                    <input type="text"  placeholder="Email" name="email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>

                <div class="input-box" >
                    <input type="phone_number"  placeholder="phone_number" name="phone_number" required>
                    <i class='bx bxs-phone' ></i>
                </div>

                <div class="input-box" >
                    <input type="textbox"  placeholder="Adress" name="address" required>
                    <i class='bx bxs-home' ></i>
                </div>

                <button type="submit" class="btn" name="submit" >New Customer</button>
            
        </form>
    </div>



</html>