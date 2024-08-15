<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="img/logo-no-background.png" alt="logo" class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="announcements.php">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faqs.php">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="application.php">Apply Now</a>
                    </li>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 35px;margin-left: 45px;">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </ul>
                <li class="nav-item dropdown">
                    <div class="notification">
                        <div class="dropstart">
                            <a href="#" class="notification-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bell"></i>
                                <span class="badge rounded-pill bg-danger">
                                    <?php
                                    $noti = "SELECT * FROM notification where userto = '$user_id'";
                                    $noti_query = $conn->query($noti);
                                    $num_noti =  $noti_query->num_rows;
                                    echo $num_noti;
                                    ?>
                                </span>
                                <span class="visually-hidden">unread messages</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" id="notificationDropdown">
                                <?php

                                $view_notifications = "SELECT * FROM notification WHERE userto = '$user_id'";
                                $view_notifications_query = $conn->query($view_notifications);
                                if ($view_notifications_query->num_rows > 0) {
                                    while ($notificaitons_row = $view_notifications_query->fetch_assoc()) {
                                        if ($notificaitons_row['type'] == 'application') {
                                            echo '<a href="profile-application.php" style="text-decoration: none;">';
                                            echo '<div class="px-3 py-1">';
                                            echo '<div class="text-white px-2 rounded" style="background-color: #05445E">';
                                            echo '<i class="fa-solid fa-clipboard-list d-inline"></i>';
                                            echo '<h6 class="card-title py-1 d-inline"> Application Update: </h6>';
                                            echo '</div>';
                                            echo '<li> <h6 class="card-title mt-2 text-black">' . $notificaitons_row['name'] . '</h6></li>';
                                            echo '<li> <p class="card-text text-black">' . $notificaitons_row['text'] . ' </p> </li>';
                                            echo '<hr style="color: #05445E;" class="mt-0 mb-0">';
                                            echo '</div>';
                                            echo '</a>';
                                        } elseif ($notificaitons_row['type'] == 'message') {
                                            echo '<a href="contact.php" style="text-decoration: none;">';
                                            echo '<div class="px-2 py-1">';
                                            echo '<div class="text-white px-2 rounded" style="background-color: #05445E">';
                                            echo '<i class="fa-solid fa-message d-inline"></i>';
                                            echo '<h6 class="card-title py-1 d-inline"> Message From: ' . $notificaitons_row['userfrom'] . '</h6>';
                                            echo '</div>';
                                            echo '<li> <h6 class="card-title mt-2 text-black"> Topic: ' . $notificaitons_row['name'] . '</h6></li>';
                                            echo '<li> <p class="card-text text-black">' . $notificaitons_row['text'] . ' </p> </li>';
                                            echo '<hr style="color: #05445E;">';
                                            echo '</div>';
                                            echo '</a>';
                                        }
                                    }
                                } else {
                                    echo '<div class = "p-3">';
                                    echo '<li> NO NOTIFICATIONS </li>';
                                    echo '</div>';
                                }

                                ?>
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        $view = "SELECT image FROM user WHERE id= $user_id";
                        $view_query = $conn->query($view);
                        if ($view_query->num_rows > 0) {
                            $row = $view_query->fetch_assoc();
                            $imagePath = $row['image'];
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" class="user" alt="user" style="border-radius: 100%;">';
                            } else {
                                echo '<img src="img/blank-profile-picture-973460.svg" class="user" alt="user" style="border-radius: 100%;">';
                            }
                        }
                        ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-header" style="font-weight: bold; color: black;">
                            <?php
                            echo "$user_name" . " $user_lastname";
                            ?></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="profile-application.php">Applications</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.php">Log out</a></li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>