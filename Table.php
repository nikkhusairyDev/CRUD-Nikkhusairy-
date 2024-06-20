<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $sql = "INSERT INTO crud (first_name, last_name, email, phone_number, address) 
            VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: table.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

// Delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql_delete = "DELETE FROM crud WHERE id = $delete_id";

    if (mysqli_query($conn, $sql_delete)) {
        header("Location: table.php?msg=Record deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
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

    <title>View table CRUD nikkhusairy</title>
    <link rel="stylesheet" href="style.css1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .alert-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1.25rem;
            border: 1px solid transparent;
            border-radius: 0.375rem;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .alert-custom .btn-close {
            padding: 0;
            background: none;
            border: none;
            color: inherit;
            font-size: 1.25rem;
            cursor: pointer;
        }
        .alert-custom .alert-message {
            flex-grow: 1;
            padding-right: 1rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Table Customer</h1>
        <div class="container">
            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div id="msg-alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . htmlspecialchars($msg) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <a href="add_data.php" class="btn btn-dark mb-3">Add New</a>
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM crud";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="link-dark">
                                    <i class='bx bxs-edit-alt'></i>
                                </a>
                                <span> | </span>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="link-dark">
                                    <i class='bx bxs-trash'></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Auto dismiss alert -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let alert = document.getElementById("msg-alert");
            if (alert) {
                setTimeout(function() {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 600); // Duration of fade effect
                }, 2500); // 3 seconds
            }
        });
    </script>
</body>
</html>
