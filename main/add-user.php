<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name=$_POST['name'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pass=$_POST['password'];
$hashed_password= password_hash($pass,PASSWORD_BCRYPT);
$role = $_POST['role'];




$add_user = "INSERT INTO user(name, lastname, gender, email, password, role) 
VALUES ('$name', '$lastname', '$gender', '$email', '$hashed_password', '$role') ";

if($conn->query($add_user) === TRUE){
    header("Location: users-db.php");
}
else{
    die("Connection Error or Error creating user");
}