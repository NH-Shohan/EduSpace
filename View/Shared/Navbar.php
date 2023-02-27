<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon Link -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
    <style>
        .error {
            color: red;
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0;
        }

        .success {
            color: green;
            font-size: 14px;
            font-weight: bold;
            /* margin: 5px 0; */
        }
    </style>
    <title>Document</title>

    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<body>
    <?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
    <div class="navbar-container">
        <div class="navbar container">
            <div class="logo">
                <img src="View/Assets/logo.svg" alt="">
            </div>
            <div class="quick-links">
                <ul>
                    <a class="nav_link <?= $page == 'index.php' ? 'active' : 'nav_link'; ?>" href="/Project">Home</a>

                    <a class="nav_link <?= $page == 'about.php' ? 'active' : 'nav_link'; ?>" href="View/Pages/about.php">About</a>

                    <a class="nav_link <?= $page == 'courses.php' ? 'active' : 'nav_link'; ?>" href="View/Pages/courses.php">courses</a>

                    <a class="nav_link <?= $page == 'instructor.php' ? 'active' : 'nav_link'; ?>" href="View/Pages/instructor.php">instructor</a>

                    <a class="nav_link <?= $page == 'audioBook.php' ? 'active' : 'nav_link'; ?>" href="View/Pages/audioBook.php">audioBook</a>

                    <a class="nav_link <?= $page == 'podcast.php' ? 'active' : 'nav_link'; ?>" href="View/Pages/podcast.php">podcast</a>
                </ul>
            </div>
            <div class="navbar_auth_link">
                <!-- Icon Gula kaj kortese na... Bujhtesi na ki hoise! -->
                <!-- <ion-icon src="../../../assets/search-outline.svg"></ion-icon>
                <i class="fa-solid fa-magnifying-glass"></i>
                <ion-icon name="cart-outline"></ion-icon> -->

                <a class="login_btn" href="View/Pages/login.php">Login</a>
                <a class="registration_btn" href="View/Pages/registration.php">Registration</a>
            </div>
        </div>
    </div>
</body>

</html>