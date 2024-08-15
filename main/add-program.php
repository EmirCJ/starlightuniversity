<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name=$_POST['name'];
$years = $_POST['years'];
$degree = $_POST['degree'];
$quota = $_POST['quota'];
$language = $_POST['language'];






$add_program = "INSERT INTO program(name, years, degree, quota, remaining_quota, language) 
VALUES ('$name', '$years', '$degree', '$quota', '$quota', '$language') ";

if($conn->query($add_program) === TRUE){
    header("Location: programs-db.php");
}
else{
    die("Connection Error or Error creating user");
}