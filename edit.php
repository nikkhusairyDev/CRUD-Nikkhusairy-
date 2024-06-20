<?php
include 'db_conn.php';

$id = $_GET['id'];
$sql = "SELECT * FROM crud WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $sql = "UPDATE crud SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', address='$address' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: table.php?msg=Record updated successfully");
        exit();
    } else {
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

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

    <title>Edit Customer</title>
    <link rel="stylesheet" href="style.css1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Edit Customer</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                <i class='bx bxs-user-circle'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Phone Number" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
                <i class='bx bxs-phone'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Address" name="address" value="<?php echo $row['address']; ?>" required>
                <i class='bx bxs-home'></i>
            </div>
            <button type="submit" class="btn" name="update">Update Customer</button>
        </form>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
