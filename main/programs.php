<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['id'];
$user_name = $_SESSION['name'];
$user_lastname = $_SESSION['lastname'];
$user_role = $_SESSION['role'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$view = "SELECT * FROM user WHERE id='$user_id' ";
$user_view = $conn->query($view);

if ($user_view->num_rows < 1) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/application.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/afe390969e.js" crossorigin="anonymous"></script>
    <title>Programs | Starlight University</title>
</head>

<body style="background-color: #D4F1F4;">

    <!-- Navbar -->
    <?php
    include "/xampp/htdocs/University/frontend/layout/navbar.php" ?>

    <!-- Main content -->
    <div class="container my-5">
                        <div>
                            <h1 class="text-center my-5">
                                Undergraduate Programs
                            </h1>
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

                        $view = "SELECT id, name, years, degree, remaining_quota, quota, language FROM program WHERE degree = 'undergraduate'";
                        $view_query = $conn->query($view);
                        if ($view_query->num_rows > 0) {
                            while ($row = $view_query->fetch_assoc()) {
                                if ($row['quota'] > 0) {
                                    echo '<div class="card mb-3 programs" style="max-width: 1080px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-success">Available<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' .$row['remaining_quota']. '/' . $row['quota'] . ' Remaining'. '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="card mb-3 programs" style="max-width: 540px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-danger">Unavailable<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' .$row['remaining_quota']. '/' . $row['quota'] . ' Remaining'. '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                        <h1 class="text-center my-5">
                                Graduate Programs
                            </h1>
                        <?php
                        $view_g = "SELECT id, name, years, degree, remaining_quota, quota, language FROM program WHERE degree = 'graduate'";
                        $view_query_g = $conn->query($view_g);
                        if ($view_query_g->num_rows > 0) {
                            while ($row = $view_query_g->fetch_assoc()) {
                                if ($row['quota'] > 0) {
                                    echo '<div class="card mb-3 programs" style="max-width: 1080px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-success">Available<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' .$row['remaining_quota']. '/' . $row['quota'] . ' Remaining'. '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="card mb-3 programs" style="max-width: 540px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-danger">Unavailable<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' .$row['remaining_quota']. '/' . $row['quota'] . ' Remaining'. '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                        </div>
    </div>
    </div>
    <?php
    include 'frontend/api/firebase.php';
    ?>
</body>
    <!-- Footer -->
    <footer>
                        <?php
                        include "/xampp/htdocs/University/frontend/layout/footer.php";
                        ?>
    </footer>
</body>

</html>