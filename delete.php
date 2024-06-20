<?php
include 'db_conn.php';

if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];

    // Check if the user has confirmed deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        $sql_delete = "DELETE FROM crud WHERE id = $delete_id";

        if (mysqli_query($conn, $sql_delete)) {
            header("Location: table.php?msg=Record deleted successfully");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        // Display confirmation dialog
        echo '<script>
                if(confirm("Are you sure you want to delete this record?")) {
                    window.location.href = "delete.php?id=' . $delete_id . '&confirm=yes";
                } else {
                    window.location.href = "table.php";
                }
              </script>';
    }
} else {
    header("Location: table.php");
    exit();
}
?>
