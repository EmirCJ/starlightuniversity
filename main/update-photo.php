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


$id = $_POST['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize(($_FILES["image"]["tmp_name"]));

    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            $image = $target_file;

            $update= "UPDATE user SET image = '$image' where id = '$id'";

            if($conn->query($update) === TRUE){
                header("Location: profile.php");
            }
            else{
                echo "error";   
            }

        }
    }
}
