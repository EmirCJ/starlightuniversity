<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];
$program_id = $_POST['program_id'];
$user_id= $_POST['user_id'];


if($status!=='rejected'){
$approve = "UPDATE application SET status = 'rejected' WHERE id= $id";
$notification = "INSERT INTO notification(name, text, type, userto) VALUES ('Your application has failed to get approved.', 'Unfortunately, Your application has not been accepted, you can check the application panel for more info.','application', '$user_id')";
$quota = "UPDATE program SET remaining_quota = remaining_quota + 1 WHERE id = '$program_id'";
 if($conn->query($approve)===TRUE){
    header("Location: application-details.php?id=$id");
    mysqli_query($conn, $notification);
    mysqli_query($conn, $quota);
 }
 else{
    echo "ERROR";
 }
 



}
else{
    echo 'CANT DO THIS PROCCESS NOW, TRY AGAIN LATER';
}
?>
