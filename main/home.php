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

//check connection
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
$view_check = "SELECT * FROM user WHERE id='$user_id' ";
$user_view_check = $conn->query($view_check);

if ($user_view_check->num_rows < 1) {
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page | Starlight University</title>
    <link rel="stylesheet" href="css/index.css">
    <?php
    include "/xampp/htdocs/University/frontend/layout/header.php" ?>
</head>

<body style="background-color: #D4F1F4;">

    <!-- Navbar -->
     <?php
    include "/xampp/htdocs/University/frontend/layout/navbar.php" ?>
    
    <div class="marquee-div px-3" style="background-color: rgb(165, 12, 12); color:white">
        <marquee behavior="scroll"><?php
                                    $view2 = "SELECT text FROM announcement";
                                    $view_query2 = $conn->query($view2);
                                    if ($view_query2->num_rows > 0) {
                                        echo 'Latest News:  ';
                                        while ($roww = $view_query2->fetch_assoc()) {

                                            echo $roww['text'];

                                            echo '<img src="img/logo-no-background.png" alt="logo" style="width: 40px" class="px-1">';
                                        }
                                    }

                                    ?></marquee>
    </div>

    <div class="banner-photo-div">
        <h1 class="banner-text" style="padding-top: 10%;">STARLIGHT UNIVERSITY'S ONLINE APPLICATION PORTAL</h1>
        <h6 class="banner-text">Send your online application easily</h6>
        <a href="application.php" style="text-decoration: none;">
            <button type="button" class="apply-button">APPLY NOW <i class="fa-solid fa-arrow-right"></i></button>
        </a>
    </div>

    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h3 style="text-align: center;">About Us</h3>
                <br>
                <p>Starlight University aims to create a scientifically rigorous and intellectually rich environment for its students, through:
                <ul>
                    <li>courses and research supervision by nationally and internationally recognized faculty members</li>
                    <li>exposure to distinguished national and international scholars and speakers</li>
                    <li>research opportunities in over 200 interdisciplinary research centers, forums, and laboratories</li>
                    <li>exposure to research practices and academic knowledge from Top-100 ranked partner universities in the U.S., Europe, and Asia through semester exchange programs</li>
                    <li>a low student-faculty ratio for a “boutique learning” experience</li>
                </ul>
                Learn more about academic and student life at Starlight University by following us on <span><a href="https://www.tiktok.com/" class="social-links">TikTok</a></span>, <span><a href="https://www.instagram.com/" class="social-links">Instagram</a></span>, <span><a href="https://www.facebook.com/" class="social-links">Facebook</a></span>, <span><a href="https://www.x.com/" class="social-links">X</a></span> and <span><a href="https://www.youtube.com/" class="social-links">Youtube</a></span>.

                From recent updates about our campus, academic, and research programs to articles from faculty members and global achievements, stay connected to the Starlight University community.
                </p>
                <hr>
                <div>
                    <h3 style="text-align: center;">Our Programs</h3>
                    <br>
                    <div class="programs-list">

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

                        $view = "SELECT id, name, years, degree, quota, remaining_quota , language FROM program WHERE id <= 10";
                        $view_query = $conn->query($view);
                        if ($view_query->num_rows > 0) {
                            while ($row = $view_query->fetch_assoc()) {
                                if ($row['remaining_quota'] > 0) {
                                    echo '<div class="card shadow-sm mb-3 programs" style="max-width: 540px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-success">Available<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' . $row['degree'] . '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="card shadow-sm mb-3 programs" style="max-width: 540px;">';
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-12">';
                                    echo '<div class="card-body">';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<h5 class="card-title mb-0">' . $row['name'] . ' (' . $row['language'] . ')' . '</h5>';
                                    echo '<span class="badge rounded-pill bg-danger">Unavailable<span class="visually-hidden">Available</span></span>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $row['years'] . ' Years</p>';
                                    echo '<p class="card-text"><small class="text-body-secondary">' . $row['degree'] . '</small></p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                        <a href="programs.php" style="text-decoration: none;">
                            <button type="button" class="apply-button">View All Programs</button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <h3 style="text-align: center;">Announcements</h3>
                <br>
                <div class="Announcements-div">
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

                    $view = "SELECT id, title, text, image, date FROM announcement WHERE id<=10";
                    $view_query = $conn->query($view);
                    if ($view_query->num_rows > 0) {
                        while ($row = $view_query->fetch_assoc()) {
                            echo '<div class="card shadow-sm my-2" style="width: 400px; display: block; margin: auto;">';
                            $imagePath = $row['image'];
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" class="card-img-top" alt="Announcement Image">';
                            } else {
                                echo '<img src="img/logo-text.png" class="card-img-top" alt="Default Image">';
                            }
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                            echo '<p class="card-text">'
                                . $row['text'] .
                                '</p>';
                            echo '<a href="#" style="text-decoration: none;"><button type="button" class="apply-button">See more...</button></a>';
                            echo '<hr>';
                            echo  '<p class="card-text"><small class="text-body-secondary">Last updated: ' . $row['date'] . '</small></p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'frontend/api/firebase.php';
    ?>
</body>
<footer>
    <?php
    include "/xampp/htdocs/University/frontend/layout/footer.php";
    ?>


</footer>

</html>