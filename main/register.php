<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection Error <br>");
}

$name = $_POST['name'];
$lastname= $_POST['lastname'];
$gender =$_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$role = "student";
$degree = $_POST['degree'];


$insert ="INSERT INTO user(name, lastname, gender, email, password, role, degree) VALUES ('$name','$lastname','$gender','$email','$hashed_password','$role','$degree')";

if($conn->query($insert)===TRUE){
    header("Location: login.php");
}
else{
    echo"query failed";
}

?>