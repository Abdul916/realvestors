<?php
session_start();
include('db_connect.php');
$email = $_POST['email'];
$role = $_POST['role'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if($user['is_active'] == 1){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_active'] = 1;
        header("Location: home.php");
        exit();
    }else{
        $activation_code = $user['activation_code'];
        $to = $email;
        $subject = "Activate Your Account";
        $message = "
        <html>
        <head>
        <title>Activate Your Account</title>
        </head>
        <body>
        <p>Click the link below to activate your account:</p>
        <a href='http://localhost/realvestors/activate.php?code=$activation_code'>Activate Account</a>
        </body>
        </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@yourwebsite.com>' . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            header("Location: index.php?success=1");
            exit();
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    }
} else {
    $activation_code = md5(rand());
    $sql = "INSERT INTO users (email, role, activation_code) VALUES ('$email', '$role', '$activation_code')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['user_id'] = $conn->insert_id;
        $to = $email;
        $subject = "Activate Your Account";
        $message = "
        <html>
        <head>
        <title>Activate Your Account</title>
        </head>
        <body>
        <p>Click the link below to activate your account:</p>
        <a href='http://localhost/realvestors/activate.php?code=$activation_code'>Activate Account</a>
        </body>
        </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@yourwebsite.com>' . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            header("Location: index.php?success=1");
            exit();
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>