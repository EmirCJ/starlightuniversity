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


$title=$_POST['title'];
$text=$_POST['text'];
$subject = $_POST['subject'];




$add_user = "INSERT INTO faq(title, text, subject) 
VALUES ('$title', '$text', '$subject') ";

if($conn->query($add_user) === TRUE){
    header("Location: faqs-db.php");
}
else{
    die("Connection Error or Error creating faq");
}