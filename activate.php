<?php
session_start();
include('db_connect.php');
if (isset($_GET['code'])) {
    $activation_code = $_GET['code'];
    $sql = "SELECT * FROM users WHERE activation_code='$activation_code'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $sql = "UPDATE users SET is_active=1 WHERE activation_code='$activation_code'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['is_active'] = 1;
            header("Location: home.php?activated=1");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid or expired activation code.";
    }
}
$conn->close();
?>