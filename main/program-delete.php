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

    
    $stmt = $conn->prepare("DELETE FROM program WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: programs-db.php');
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID not set.";
}

$conn->close();
?>