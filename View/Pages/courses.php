<?php
session_start();

require_once './../../Controller/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpace</title>
    <link rel="stylesheet" href="./../../View/styles.css">
    <!-- Link to Font Awesome using a CDN -->
    <!-- Link to Font Awesome using a CDN -->
    <!-- Icon Link -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />



    <style>
        .search-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-container form {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            width: 100%;
        }

        .search-container input {
            width: 600px;
        }

        .search-container input[type="text"] {
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
            width: 100%;
        }

        .search-container button[type="submit"] {
            border: none;
            outline: none;
            background-color: var(--text);
            color: #fff;
            font-size: 16px;
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 200ms;
        }

        .search-container button[type="submit"]:hover {
            background-color: var(--secondaryText);
        }

        /* Category */
        .category-bar {
            background-color: var(--tertiary);
            padding: 10px;
        }
        
        .category-bar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .category-bar li {
            margin-inline: 10px;
        }
        
        .category-bar li a {
            color: var(--primary);
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            border-radius: 3px;
            transition: all 200ms;
        }

        .category-bar li a:hover {
            background-color: var(--text);
            color: #fff;
        }

        /* Add a menu icon for smaller screens */
        .category-bar span {
            display: none;
            /* Hide by default */
        }

        @media screen and (max-width:768px) {
            .category-bar span {
                display: block;
                /* Hide by default */
            }

            /* Use media query for screens smaller than or equal to
768 pixels */
            .category-bar ul {
                /* Hide all categories except for first one */
                display: none;

            }

            .category-bar ul:first-child {
                /* Show only first category */
                display: flex;
                align-items: center;
            }

            .category-bar span {
                color: var(--primary);
                font-weight: bold;
            }

            .category-bar li {
                padding: 10px 0;
            }

            .icon {
                /* Show menu icon */
                display: block;
                float: right;
                font-size: 24px;
                cursor: pointer;
                color: var(--primary)
            }
        }

        /* Motivation */
        .hero-image {
            background-image: url('https://th.bing.com/th/id/R.3862109c056fe80204d7aef8470150f4?rik=A0oDtIyjEjOjvw&riu=http%3a%2f%2fcdn.wallpapersafari.com%2f1%2f81%2f5Pyr6G.jpg&ehk=ymUXQYxu68NYH1pQ4LI1rFNsB3r8KSXuoVu6svwhZ%2bs%3d&risl=&pid=ImgRaw&r=0');
            background-size: cover;
            background-position: center;
            box-shadow: inset 0px 0px 400px 110px rgba(0, 0, 0, .7);
            height: 500px;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }

        .hero-text h1 {
            font-size: clamp(3rem, 6vw, 6rem);
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .button {
            background-color: var(--text);
            color: #fff;
            border: none;
            padding: 12px 32px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 200ms;
        }

        .button:hover {
            background-color: var(--darkText);
        }

        /* Recommended */
        /* Recommended Courses Slider */
        .recommended-courses {
            padding: 50px 0;
            border-radius: 10px;
        }

        .recommended-courses h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            margin: 0 auto;
            width: 80%;
            max-width: 1200px;
        }


        .slider-track {
            display: flex;
            flex-wrap: nowrap;
            transition: transform 0.5s ease-in-out;
        }

        .course-card {
            /* flex: 0 0 calc(33.33% - 20px); */
            min-width: 300px;
            margin-right: 20px;
            background-color: #fff;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: var(--darkText);
            padding: 10px;
        }

        .course-details {
            padding: 20px;
        }

        .course-details h3 {
            text-align: left;
            font-size: 24px;
            margin: 0;
            margin-bottom: 10px;
        }

        .course-details p {
            font-size: 18px;
            margin: 0;
        }

        .slider-buttons {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            /* background-color: rgba(0, 0, 0, 0.3); */
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            cursor: pointer;
            z-index: 1;
            transition: opacity 0.2s ease-in-out;
        }

        .slider-button-left {
            left: 20px;
            background-color: var(--primary);
            border-left: 1px solid var(--text);
            height: 30vh;
            padding: 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.9;
        }

        .slider-button-left:hover {
            opacity: 0.6;
        }


        .slider-button-right {
            right: 20px;
            padding: 0 5px;
            background-color: var(--primary);
            border-right: 1px solid var(--text);
            height: 30vh;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.9;
        }

        .slider-button-right:hover {
            opacity: 0.6;
        }

        i {
            color: var(--text);
            font-size: 28px !important;
            z-index: 999;
        }

        @media screen and (max-width:768px) {
            .slider-container {
                position: relative;
                overflow-x: auto;
                width: 100%;
            }

            .course-card {
                flex: auto;
            }

            .slider-buttons {
                display: none;
            }
        }

        /* Courses */
        .all-courses {
            padding: 50px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h2 {
            color: var(--text);
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
        }

        .course-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            justify-items: space-between;
            /* display: flex;
            flex-wrap: wrap;
            justify-content: center; */
        }

        .course-card {
            width: 340px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .course-card img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            /* margin-bottom: 20px; */
            /* margin: -20px; */
        }

        .course-card h3 {
            font-size: clamp(18px, 6vw, 24px);
            margin-bottom: 10px;
        }

        .course-card p {
            font-size: clamp(14px, 6vw, 18px);
            margin-bottom: 20px;
        }

        .course-card a {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--darkText);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .recommended {
            flex: 0 0 calc(31%-20px) !important;
            /* flex: flex-grow flex-shrink flex-basis */
            /* 
            flex-grow: Determines how much the item should grow in relation to the other items in the container. In this case, it's set to 0, which means it won't grow.

            flex-shrink: Determines how much the item should shrink in relation to the other items in the container. In this case, it's also set to 0, which means it won't shrink.

            flex-basis: Specifies the initial size of the item before any remaining space is distributed. Here, it's set to calc(30% - 20px). This means the item should take up 30% of the available space minus 20 pixels.
            */
            min-width: 300px;
            margin-right: 20px;
            background-color: #fff;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        .recommended h3 {

            font-size: clamp(16px, 6vw, 22px);
        }

        .recommended img {
            width: 100%;
            height: 150px;
        }

        .course-card p {
            font-size: clamp(12px, 6vw, 16px);
            margin-bottom: 20px;
        }

        .course-card a:hover {
            background-color: var(--secondaryText);
        }

        .course-card img {
            border-radius: 5px;
        }

        .courseImg {
            margin: 0 -20px;
            padding: 20px 0;
            background-color: var(--darkText);
        }
        .all-courses{
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <?php include "./../../View/Shared/Navbar.php" ?>

    <!-- Main page -->
    <div class="courses">
        <!-- Search bar -->
        <div class="search-container">
            <div class="container">
                <form action="#" method="get">
                    <input type="text" placeholder="Search for courses...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- Category -->
        <div class="category-bar">
            <div class="">
                <!-- Add a menu icon -->
                <span class="icon" onclick="toggleCategoryMenu()">&#9776;</span> <span>Categories</span>
                <ul>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Finance & Accounting</a></li>
                    <li><a href="#">IT & Software</a></li>
                    <li><a href="#">Office Productivity</a></li>
                    <li><a href="#">Personal Development</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Marketing</a></li>
                </ul>
            </div>
        </div>

        <!-- Motivation -->
        <div class="hero-image">
            <div class="hero-text">
                <h1>Learn Anything Online</h1>
                <p>Get access to thousands of courses taught by industry experts</p>
                <a href="#all-course" class="button">Explore Courses</a>
            </div>
        </div>

        <!-- Recommended -->
        <section class="recommended-courses">
            <h2>Recommended Courses</h2>
            <div class="slider-container">
                <div class="slider-track">
                    <?php
                    // select all records from the courses table
                    $sql = "SELECT * FROM recommended_courses JOIN courses ON recommended_courses.course_id = courses.course_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="course-card recommended">
                                <div class="course-details">
                                    <h3>
                                        <?php echo $row['course_name']; ?>
                                    </h3>
                                    <div class="courseImg">
                                        <img src="<?php echo $row['course_image']; ?>" alt="<?php echo $row['course_name']; ?>">
                                    </div>
                                    <p>
                                        Instructor:
                                        <?php echo $row['instructor_name']; ?>
                                    </p>
                                    <p>
                                        Rating:
                                        <?php echo $row['rating']; ?>⭐
                                    </p>
                                    <p>
                                        Fee: BDT
                                        <?php echo $row['course_fee']; ?>
                                    </p>
                                    <a href="showCourse.php?course_id=<?php echo $row['course_id'] ?>">Let's Explore</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
                </div>
                <div class="slider-buttons">
                    <div class="slider-button slider-button-left" onclick="moveSlider(-1)">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                    <div class="slider-button slider-button-right" onclick="moveSlider(1)">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses -->
        <section class="all-courses">
            <div class="container" id="all-course">
                <h2>All Courses</h2>
                <div class="course-cards">
                    <?php
                    // select all records from the courses table
                    $sql = "SELECT * FROM courses";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="course-card">
                                <img src="<?php echo $row['course_image']; ?>" alt="<?php echo $row['course_name']; ?>">
                                <div class="course-details">
                                    <h3>
                                        <?php echo $row['course_name']; ?>
                                    </h3>
                                    <p>
                                        <?php echo $row['course_category']; ?>
                                    </p>
                                    <p>
                                        Instructor:
                                        <?php echo $row['instructor_name']; ?>
                                    </p>
                                    <p>
                                        Rating:
                                        <?php echo $row['rating']; ?>⭐
                                    </p>
                                    <a href="#">Let's Explore</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>
    <!-- Finish -->

    <?php include "./../../View/Shared/Footer.php" ?>
    <!-- for Navbar Responsive -->
    <script>
        // Get the slider container and track
        const sliderContainer = document.querySelector('.slider-container');
        const sliderTrack = document.querySelector('.slider-track');

        // Get the slider buttons
        const sliderLeftButton = document.querySelector('.slider-button-left');
        const sliderRightButton = document.querySelector('.slider-button-right');

        // Get the width of each slide
        const slideWidth = document.querySelector('.course-card').offsetWidth + 20; // add 20px margin

        // Set the initial slide index
        let slideIndex = 0;

        // Move the slider track to show the next or previous slide
        function moveSlider(direction) {
            // Calculate the new slide index based on the direction
            slideIndex += direction;

            // Check if the new slide index is out of bounds
            if (slideIndex < 0) {
                slideIndex = 0;
            } else if (slideIndex > sliderTrack.children.length - 1) {
                slideIndex = sliderTrack.children.length - 1;
            }

            // Calculate the new position of the slider track
            const newPosition = -slideIndex * slideWidth;

            // Move the slider track to the new position
            sliderTrack.style.transform = `translateX(${newPosition}px)`;
        }

        // Add event listeners to the slider buttons
        sliderLeftButton.addEventListener('click', function () {
            moveSlider(-1);
        });

        sliderRightButton.addEventListener('click', function () {
            moveSlider(1);
        });

    </script>
    <script src="./../../View/Shared/navbarScript.js"></script>
    <script>
        function toggleCategoryMenu() {
            var x = document.querySelector(".category-bar ul"); // Select all categories
            if (x.style.display === "none") { // If hidden, show them
                x.style.display = "block";
            } else { // If shown, hide them
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>