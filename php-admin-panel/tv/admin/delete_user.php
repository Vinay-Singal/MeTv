<?php
include('config/dbcon.php');

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Sanitize and validate user input (e.g., ensure $user_id is an integer)
    $user_id = intval($user_id);

    // Perform the delete operation
    $query = "DELETE FROM users WHERE id = $user_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo 'User deleted successfully';
    } else {
        echo 'Error deleting user';
    }
} else {
    echo 'Invalid request';
}
?>
