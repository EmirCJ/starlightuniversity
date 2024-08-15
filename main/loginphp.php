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

$email = $_GET['email'];
$pass = $_GET['password'];

$ameer = "SELECT id,name,lastname, gender, role, degree, password, image FROM user WHERE email = '$email'";
$queried = $conn->query($ameer);

if ($queried->num_rows > 0) {
    $row = $queried->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['degree'] = $row['degree'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['image'] = $row['image'];


        
        if ($row['role'] === 'student') {
            header('Location: home.php'); 
        } else {
            header('Location: login-admin.html'); 
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