<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Starlight University</title>
    <link rel="stylesheet" href="css/login.css">
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

<body style="background-color:#D4F1F4;">
    <nav>
        <div class="navbar-logo" style="display: flex;">
            <a href="index.html">
                <img src="img/logo-no-background.png" alt="logo" class="logo-img img-fluid">
            </a>
            <a href="index.html" class="uni-name">
                <h4 class="uni-name" id="name-before">Starlight University</h4>
            </a>
        </div>
    </nav>
    <br>
    <br>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="big-text text-center">
                    Log in to submit and see the progress of your application!
                </h1>
                <br>
                <br>
                <form action="loginphp.php" class="login-form mx-auto" method="GET">
                    <div class="email-div mx-auto">
                        <label for="email" class="login-label">Email</label>
                        <div class="input-container" style="margin-left: 2px;">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" class="login-input" name="email">
                        </div>
                    </div>
                    <br>
                    <div class="password-div mx-auto">
                        <label for="password" class="login-label">Password</label>
                        <div class="input-container" style="margin-left: 2px;">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="password" class="login-input" name="password">
                            <i class="fa-solid fa-eye fa-fw" id="visibility"></i>
                        </div>
                    </div>
                    <br>
                        <button type="submit" class="buttons" name="id" value="''">Log in</button>
                    
                    <div class="mx-auto text-center mt-3">
                        <a href="login-admin.html" class="small-text-admin">
                            Admin Login
                        </a>
                    </div>
                </form>
                <div class="down-div d-flex p-3 w-100 mx-auto">
                    <a href="register.html" class="small-text-admin">Sign up</a>
                    <a href="reset-password.html" class="small-text-admin ms-auto">Forgot Password?</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="bgg"></div>
            </div>
        </div>
    </div>
    <script src="js/transition.js"></script>
    <script src="js/visibility.js"></script>
</body>

</html>
