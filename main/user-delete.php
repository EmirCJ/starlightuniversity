<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    $delete_applications = " DELETE FROM application WHERE user_id = '$id'";
    $delete_notifications = " DELETE FROM notification WHERE userto = '$id'";
    $delete_messages =" DELETE FROM message WHERE sender = '$id' OR reciever = '$id' ";

    if ($stmt->execute()) {
        mysqli_query($conn, $delete_applications);
        mysqli_query($conn, $delete_notifications);
        mysqli_query($conn, $delete_messages);
        header('Location: users-db.php');

    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID not set.";
}

$conn->close();
?>