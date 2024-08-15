<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error <br>");
}

$email = $_POST['email'];
$pass = $_POST['password'];

$ameer = "SELECT password, role FROM user WHERE email = '$email'";
$queried = $conn->query($ameer);

if ($queried->num_rows > 0) {
    $row = $queried->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role'];
        
        if ($row['role'] === 'admin') {
            header('Location: dashboard.php'); 
        } else {
            header('Location: login.php'); 
        }
        exit(); 
    } else {
        echo "Wrong password";
    }
} else {
    echo "Wrong email";
}

 
$conn->close();
?>