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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Starlight University</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/afe390969e.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:#D4F1F4 ;">
    <?php
    include "/xampp/htdocs/University/frontend/layout/navbar.php" ?>
    <div class="container-fluid map-div">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d46488.67249902538!2d28.827826367264144!3d40.99435506666838!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2str!4v1721670700323!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="container-fluid my-3 bg-light">
        <div class="row">
            <div class="col-sm-6 px-5 py-5">
                <h4>Contact Info</h4>
                <hr>
                <form action="send-message.php" method="post" id="message-form">
                    <div class="row my-4">
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" aria-label="name" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" aria-label="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" aria-label="email" class="form-control" required placeholder="name@mail.com">
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" aria-label="phone" class="form-control" placeholder="0 501 234 56 78" required>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="program">Subject</label>
                            <input type="text" name="subject" id="subject" aria-label="subject" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="reciever">Reciever</label>
                            <select name="reciever" id="reciever" aria-label="reciever" class="form-select" required>
                                <option selected disabled>Select...</option>
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

                                $view = "SELECT id, name, lastname, degree FROM user WHERE role = 'admin' ";
                                $view_query = $conn->query($view);

                                if ($view_query->num_rows > 0) {
                                    while ($row = $view_query->fetch_assoc()) {
                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . " " . $row['lastname'] . " - " . $row['degree'] . '</option>';
                                    }
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-12 mb-3">
                            <label for="text">Your Message</label>
                            <textarea type="text" name="text" id="text" aria-label="text" class="form-control" style="height: 120px;" placeholder="Write your message here" required></textarea>
                        </div>
                    </div>

                    <div class="checkbox-wrapper-13">
                        <input id="c1-13" type="checkbox" required>
                        <label for="c1-13">I agree to the <a href="#">terms and conditions</a></label>
                    </div>
                    <div class="submit-button d-flex">
                        <button type="submit" class="btn edit-btn mt-3 mx-0" id="submit-button">Submit</button>
                    </div>
                    <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
                </form>
            </div>

            <div class="col-sm-6 py-5 pe-5">
                <div class="row" style="text-align: center;">
                    <h4>Follow Us</h4>
                    <div class="d-flex">
                        <div class="mx-auto">
                            <a href="https://www.facebook.com/"><i class="facebook social fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/"><i class="instagram social fa-brands fa-instagram"></i></a>
                            <a href="https://www.x.com/"><i class=" x social fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="linkedin social fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 alert alert-light">
                        <div class="contact-items">
                            <i class="fa-solid fa-location-dot"></i>
                            <h6 class="ms-2">Fevzi Çakmak Mh. Osmancık Sokağı No:14 34788 Bahçelievler / İstanbul / Türkiye</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 alert alert-light">
                        <div class="contact-items">
                            <i class="fa-solid fa-phone"></i>
                            <h6 class="ms-2">+90 531 229 43 89</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 alert alert-light">
                        <div class="contact-items">
                            <i class="fa-solid fa-envelope"></i>
                            <h6 class="ms-2">info@starlight.com</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 alert alert-light">
                        <div class="contact-items">
                            <i class="fa-solid fa-map"></i>
                            <h6 class="ms-2">Map</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-md-6 alert alert-light">
                        <div class="contact-items">
                            <i class="fa-solid fa-clock"></i>
                            <h6 class="ms-2">8:30 - 18:30</h6>
                        </div>
                    </div>
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