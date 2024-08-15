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

$reciever_id = $_POST['reciever'];
$sender_id = $_POST['sender_id'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$reciever=$_POST['reciever'];
$text = $_POST['text'];

$add_user = "INSERT INTO message(name, lastname, email, phone, subject, reciever, sender, text) 
VALUES ('$name', '$lastname', '$email', '$phone', '$subject', '$reciever_id', $sender_id, '$text')";

if($conn->query($add_user) === TRUE){
    header("Location: contact.php#submit-button");
}
else{
    die("Connection Error or Error creating user");
}