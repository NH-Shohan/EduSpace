<?php
session_start();
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
            background-color: var(--darkText);
            color: #fff;
            font-size: 16px;
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button[type="submit"]:hover {
            background-color: var(--secondaryText);
        }

        /* Category */
        .category-bar {
            background-color: var(--secondaryText);
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
            margin: 5px 10px;

        }

        .category-bar li a {
            color: var(--primary);
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            border-radius: 5px;
        }

        .category-bar li a:hover {
            background-color: var(--darkText);
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
            background-color: var(--darkText);
            color: #fff;
            border: none;
            padding: 12px 32px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        /* Recommended */
        /* Recommended Courses Slider */
        .recommended-courses {
            padding: 50px 0;
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
            flex: 0 0 calc(33.33% - 20px);
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
        }

        .course-details {
            padding: 20px;
        }

        .course-details h3 {
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

        .slider-buttons:hover {
            opacity: 0.8;
        }

        .slider-button-left {
            left: 20px;
            border-top-right-radius: 50%;
            border-bottom-right-radius: 50%;
        }

        .slider-button-right {
            right: 20px;
            border-top-left-radius: 50%;
            border-bottom-left-radius: 50%;
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
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
        }

        .course-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* display: flex;
            flex-wrap: wrap;
            justify-content: center; */
        }

        .course-card {
            width: 300px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .course-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .course-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .course-card p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .course-card a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .course-card a:hover {
            background-color: #0069d9;
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
                <a href="#" class="button">Explore Courses</a>
            </div>
        </div>

        <!-- Recommended -->
        <section class="recommended-courses">
            <h2>Recommended Courses</h2>
            <div class="slider-container">
                <div class="slider-track">
                    <?php
                    // Recommended courses array
                    $recommendedCourses = array(
                        array(
                            'title' => 'Introduction to Web Development',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$49.99'
                        ),
                        array(
                            'title' => 'Java Programming for Beginners',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$59.99'
                        ),
                        array(
                            'title' => 'Python Data Science Essentials',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$69.99'
                        ),
                        array(
                            'title' => 'Learn Photoshop CC 2021',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$79.99'
                        ),
                        array(
                            'title' => 'Complete iOS Development Course',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$89.99'
                        ),
                        array(
                            'title' => 'Digital Marketing Fundamentals',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'price' => '$99.99'
                        )
                    );

                    // Assuming $recommendedCourses is an array of recommended courses with properties like 'title', 'image', 'price', etc.
                    foreach ($recommendedCourses as $course) {
                        ?>
                        <div class="course-card">
                            <img src="<?php echo $course['image']; ?>" alt="<?php echo $course['title']; ?>">
                            <div class="course-details">
                                <h3>
                                    <?php echo $course['title']; ?>
                                </h3>
                                <p>
                                    <?php echo $course['price']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
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
            <div class="container">
                <h2>All Courses</h2>
                <div class="course-cards">
                    <?php
                    $courses = array(
                        array(
                            'title' => 'Introduction to Web Development',
                            'description' => 'Learn the basics of web development including HTML, CSS, and JavaScript.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/introduction-to-web-development',
                        ),
                        array(
                            'title' => 'Intermediate Web Development',
                            'description' => 'Take your web development skills to the next level with advanced CSS and JavaScript techniques.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/intermediate-web-development',
                        ),
                        array(
                            'title' => 'Introduction to Data Science',
                            'description' => 'Learn the fundamentals of data science including statistics, data analysis, and machine learning.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/introduction-to-data-science',
                        ),
                        array(
                            'title' => 'Advanced Data Science',
                            'description' => 'Take your data science skills to the next level with advanced topics like deep learning and natural language processing.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/advanced-data-science',
                        ),
                        array(
                            'title' => 'Introduction to Graphic Design',
                            'description' => 'Learn the basics of graphic design including typography, color theory, and layout.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/introduction-to-graphic-design',
                        ),
                        array(
                            'title' => 'Intermediate Graphic Design',
                            'description' => 'Take your graphic design skills to the next level with advanced topics like branding and advertising design.',
                            'image' => 'https://img-c.udemycdn.com/course/480x270/2462140_b27f_2.jpg',
                            'url' => 'https://example.com/courses/intermediate-graphic-design',
                        ),
                    );
                    // Loop through all courses and display them as cards
                    foreach ($courses as $course) {
                        echo '<div class="course-card">';
                        echo '<img src="' . $course['image'] . '" alt="' . $course['title'] . '">';
                        echo '<h3>' . $course['title'] . '</h3>';
                        echo '<p>' . $course['description'] . '</p>';
                        echo '<a href="' . $course['url'] . '">Learn More</a>';
                        echo '</div>';
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