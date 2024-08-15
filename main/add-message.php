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

/*
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$nl = "$name"."$lastname";
$reciever = $_POST['reciever'];
$reciever_id = $_POST['id'];
$subject = $_POST['subject'];
$text = $_POST['text'];
*/

/*
$send = "INSERT INTO message(name, lastname, reciever, subject, text)
                     VALUES ('$name', '$lastname', '$reciever', '$subject', '$text' )";

mysqli_query($conn, $send);

$add_noti = "INSERT INTO notification(name, text, type, userfrom, userto)
                              VALUES ('Admin', '$text', 'message', '$nl', '$reciever_id')";
mysqli_query($conn, $add_noti);

*/

$reciever_id = $_POST['reciever'];
//$sender_id = $_POST['sender'];
$sender_id = '14';
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$subject = $_POST['subject'];
$text = $_POST['text'];


$send_message = "INSERT INTO message(subject, text, reciever, name, lastname, sender) 
                 VALUES('$subject','$text','$reciever_id','$name','$lastname', '$sender_id')";

mysqli_query($conn, $send_message);

$send_notification = "INSERT INTO notification(name, text, type, userfrom, userto) VALUES('$subject','$text', 'message' ,'$sender_id' ,'$reciever_id')";

mysqli_query($conn, $send_notification);

header("Location: messages-db.php");

?>