<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}


$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$degree = $_POST['degree'];



$update = "UPDATE user SET name = '$name', lastname = '$lastname', email = '$email', gender = '$gender', degree = '$degree' WHERE id='$id' ";

$update_query = $conn->query($update);
if($update_query === TRUE){
    header('Location: profile.php');
}
else{
    echo "error";
}


?>