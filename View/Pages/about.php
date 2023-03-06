<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpace</title>
    <link rel="stylesheet" href="./../../View/styles.css">
    <style>
        .course-card {
            width: 300px;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }

        /* Make the image fit the card width */
        .course-card img {
            width: 100%;
        }

        /* Center the text content */
        .course-card h3,
        .course-card p {
            text-align: center;
        }

        /* Add some hover effect to the card */
        .course-card:hover {
            /* Change the border color */
            border-color: blue;

            /* Add some shadow effect */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);

            /* Rotate the card slightly */
            transform: rotate(5deg);

            /* Transition the effects smoothly */
            transition: all .5s ease-in-out;
        }
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <h1>About</h1>
    <?php include "./../../View/Shared/Footer.php" ?>

    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>