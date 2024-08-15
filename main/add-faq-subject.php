<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['subject_name'];

$insert= "INSERT INTO faqs_subjects(name) VALUES ('$name')";
mysqli_query($conn, $insert);
header("Location: faqs-db.php")
?>