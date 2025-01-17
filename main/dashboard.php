<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}

$select_users = "SELECT * FROM user";
$select_applications = "SELECT * FROM application";
$select_accepted_applications = "SELECT * FROM application WHERE status = 'accepted'";
$select_pending_applications = "SELECT * FROM application WHERE status = 'pending'";
$select_messages = "SELECT * FROM message WHERE reciever = 14";

$users_query = $conn->query($select_users);
if ($users_query->num_rows > 0) {
 $row_users = $users_query->fetch_assoc();
}

$applications_query = $conn->query($select_applications);
if($applications_query->num_rows>0){
    $row_applications = $applications_query->fetch_assoc();
}

$accepted_applications_query = $conn->query($select_accepted_applications);
$pending_applications_query = $conn->query($select_pending_applications);
$select_messages_query = $conn->query($select_messages);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
    <form action="https://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
        <input name="sitesearch" type="hidden" value="starlight.com">
        <input autocomplete="on" class="form-control search" name="q" placeholder="Search in example.com" required="required"  type="text">
        <button class="button" type="submit">Search</button>
        </form>
        -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | Starlight University</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/afe390969e.js" crossorigin="anonymous"></script>
    </head>
</head>

<body style="background-color: rgb(240, 239, 239);">
    <div class="sidebar">
        <a class="active" href="dashboard.php"> <i class="fa-solid fa-house"></i> Home</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Components </h6>
        <a href="announcement-db.php"> <i class="fa-solid fa-bullhorn"></i> Announcements</a>
        <a href="faqs-db.php"> <i class="fa-solid fa-question pe-1"></i>FAQs</a>
        <a href="programs-db.php"> <i class="fa-solid fa-graduation-cap"></i> Programs</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Management </h6>
        <a href="users-db.php"><i class="fa-solid fa-user"></i> Users</a>
        <a href="messages-db.php"> <i class="fa-solid fa-envelope"></i> Messages</a>
        <a href="applications-db.php"> <i class="fa-solid fa-clipboard-list"></i> Applications</a>
        <a href="notifications-db.php"> <i class="fa-solid fa-bell"></i> Notifications</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Stats </h6>
        <a href="reports-db.html"> <i class="fa-solid fa-chart-simple"></i> Reports</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav sasas" style="padding-left: 15px;">
                    <a class="nav-item nav-link uni-home" href="home.php">University Homepage</a>

                </div>
                <div class="navbar-pic">
                    <a class="nav-item">
                        <img src="img/blank-profile-picture-973460.svg" alt="user" class="user-pic">
                        <a href="index.html" style="text-decoration: none; color: black; padding-left: 10px;">Log
                            Out</a>
                    </a>
                </div>
            </div>
        </nav>
        <h2 class="my-5 text-center">Welcome to Startlight University's Dashboard</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                            <h4 class="card-title">Total Users</h4>
                            <a href="users-db.php" class="ms-auto" style="text-decoration: none; color: #189AB4 ;">View</a>
                        </div>
                            <h6><?php
                            echo $users_query->num_rows;
                            ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title">Applications Made</h4>
                                <a href="applications-db.php" class="ms-auto" style="text-decoration: none; color: #189AB4 ;">View</a>
                            </div>
                            <h6><?php
                            echo $applications_query->num_rows;
                            ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title">Accepted Students</h4>
                                <a href="applications-db.php" class="ms-auto" style="text-decoration: none; color: #189AB4 ;">View</a>
                            </div>
                            <h6><?php
                            echo $accepted_applications_query->num_rows;
                            ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="my-5 text-center">Actions To Make</h2>
            <div class="row">
        <div class="col-sm-4 ms-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title">Pending Applications</h4>
                        <a href="applications-db.php" class="ms-auto" style="text-decoration: none; color: #189AB4 ;">View</a>
                    </div>
                    <h6><?php
                            echo $pending_applications_query->num_rows;
                    ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4 me-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title">Recieved Messages</h4>
                        <a href="messages-db.php" class="ms-auto" style="text-decoration: none; color: #189AB4 ;">View</a>
                    </div>
                    <h6>
                     <?php echo $select_messages_query->num_rows ?>
                    </h6>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</body>

</html>