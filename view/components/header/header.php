<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpace</title>

    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!-- CSS Link -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./view/components/header/header.css">

    <!-- Icon Link -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
</head>

<body>
    <?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
    <div class="header_section">
        <div class="navbar_logo">
            <a href="/EduSpace">
                <img src="assets/logo.png" alt="Logo">
            </a>
        </div>

        <nav class="navbar_page_links">
            <a class="nav_link <?= $page == 'index.php' ? 'active' : 'nav_link'; ?>" href="/EduSpace">Home</a>

            <a class="nav_link <?= $page == 'about.php' ? 'active' : 'nav_link'; ?>" href="about.php">About</a>

            <a class="nav_link <?= $page == 'courses.php' ? 'active' : 'nav_link'; ?>" href="courses.php">courses</a>

            <a class="nav_link <?= $page == 'instructor.php' ? 'active' : 'nav_link'; ?>" href="instructor.php">instructor</a>

            <a class="nav_link <?= $page == 'audioBook.php' ? 'active' : 'nav_link'; ?>" href="audioBook.php">audioBook</a>

            <a class="nav_link <?= $page == 'podcast.php' ? 'active' : 'nav_link'; ?>" href="podcast.php">podcast</a>
        </nav>

        <div class="navbar_auth_link">
            <!-- Icon Gula kaj kortese na... Bujhtesi na ki hoise! -->
            <ion-icon src="../../../assets/search-outline.svg"></ion-icon>
            <i class="fa-solid fa-magnifying-glass"></i>
            <ion-icon name="cart-outline"></ion-icon>

            <a class="login_btn" href="login.php">Login</a>
            <a class="registration_btn" href="registration.php">Registration</a>
        </div>
    </div>
</body>

</html>