<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | Starlight University</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/afe390969e.js" crossorigin="anonymous"></script>
    </head>
</head>

<body style="background-color: rgb(240, 239, 239);">
    <div class="sidebar">
        <a href="dashboard.php"> <i class="fa-solid fa-house"></i> Home</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Components </h6>
        <a href="announcement-db.php"> <i class="fa-solid fa-bullhorn"></i> Announcements</a>
        <a href="faqs-db.php"> <i class="fa-solid fa-question"></i>FAQs</a>
        <a href="programs-db.php"> <i class="fa-solid fa-graduation-cap"></i> Programs</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Management </h6>
        <a href="users-db.php"><i class="fa-solid fa-user"></i> Users</a>
        <a href="messages-db.php"> <i class="fa-solid fa-envelope"></i> Messages</a>
        <a  href="applications-db.php"> <i class="fa-solid fa-clipboard-list"></i> Applications</a>
        <a class="active" href="notifications-db.php"> <i class="fa-solid fa-bell"></i> Notifications</a>
        <h6 class="pt-4 ps-2 ms-2 text-uppercase text-xs subjects font-weight-bolder opacity-6"> Stats </h6>
        <a href="reports-db.html"> <i class="fa-solid fa-chart-simple"></i> Reports</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="programs-div">
            <h2 class="db-title">Notifications:</h2>
            <div class="posted-Announcements" style="display:block;">
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Text</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Notification Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">From</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">To</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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

                            $view = "SELECT * FROM notification ";
                            $view_query = $conn->query($view);

                            if ($view_query->num_rows > 0) {
                                while ($row = $view_query->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['name'] . "</td>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['text'] . "</td>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['type'] . "</td>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['userfrom'] . "</td>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['userto'] . "</td>";
                                    echo "<td class='nav-link-text ps-5'>" . $row['date'] . "</td>";
                                    echo '<td class="nav-link-text ps-5">';
                                    echo '<div class="d-flex">';
                                    echo '<form action="notification-delete.php" method="post" style="display:inline-block;">';
                                    echo '<button type="submit" class="btn btn-danger mx-2" name="id" value="' . $row['id'] . '">Delete</button>';
                                    echo '</form>';
                                    //echo '<form action="program-update.php" method="get" style="display:inline-block;">';
                                    //echo '<button type="submit" class="btn edit-btn mx-2" name="id" value="' . $row['id'] . '">Edit</button>';
                                    //echo '</form>';
                                    echo '</td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td class='nav-link-text ps-5' colspan='7' style='text-align: center;'>THERE ARE NO NOTIFICATIONS</td>";
                                echo "</tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>

</html>