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

$announcement_id = $_GET['id']; 

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
    <title>Announcements | Starlight University</title>
</head>

<body style="background-color: #D4F1F4;">

    <!-- Navbar -->
    <?php
    include "/xampp/htdocs/University/frontend/layout/navbar.php" ?>

    <!-- Main content -->
    <div class="d-flex">
        <div class="p-3" style="background-color: var(--bs-secondary-bg); width: 300px;">
            <ul class="nav flex-column">
                <?php
                $announcements = "SELECT * FROM announcement";
                $announcements_query = $conn->query($announcements);
                if($announcements_query->num_rows>0){
                    while($announcements_row = $announcements_query->fetch_assoc()){
                        echo '<li class="nav-item">
                      <a class="nav-link text-dark "href="announcements-details.php?id='.$announcements_row['id'].'">'.$announcements_row['title'].'</a>
                </li>
                <hr>';
                    }
                }
                ?>
                
                
            </ul>
        </div>
        <?php
        $announcementss= "SELECT * FROM announcement where id='$announcement_id'";
        $announcementss_queryy = $conn->query($announcementss);
         $first_row = $announcementss_queryy->fetch_assoc();
         if ($first_row) {
            echo '<div class="flex-grow-1 p-3" style="min-height: 800px;">';
            echo '<div class="card">';
                 echo '<div class="card-body">';
                    echo '<div class="d-flex py-3">';
                    echo '<h3>'.$first_row['title'].'</h3>';
                    echo '<p class=" pt-2 ms-auto" style="vertical-align:baseline;">'.$first_row['date'].'</p>';
                    echo '</div>';
                    echo '<div style="overflow: visible; max-width:1000px;">';
                        echo '<p>'.$first_row['text'].'</p>';
                    echo '</div>';
                    echo '<div class="m-auto">';
                        if(!empty($first_row['image'])){
                        echo'<img src="'.$first_row['image'].'" alt="announcement-img" style="max-width: 950px; max-height:950px; margin-left: 7%;" >';
                        }
                        else{
                        echo'<img src="img/logo-text.png" alt="announcement-img" style="max-width: 950px; max-height:950px; margin-left: 7%;" >';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
          
         }
           
         
        ?>
        
    </div>
    <!-- Footer -->
    <footer>
        <?php
        include "/xampp/htdocs/University/frontend/layout/footer.php";
        ?>
    </footer>
    
</body>

</html>