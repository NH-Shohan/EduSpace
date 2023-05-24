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
    <style>
        <style>body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .dashboard_container {
            height: calc(100vh - 60px);
            display: grid;
            grid-template-columns: 300px auto;
        }

        .dashboard_content_section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 0 auto;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            margin-bottom: 10px;
        }

        ul li:before {
            content: "• ";
            color: #4CAF50;
        }

        ul li {
            color: #333;
        }

        .error {
            color: #f00;
        }
    </style>
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html>


    <body>
        <?php include "./../../View/Shared/Navbar.php" ?>
        <div class="dashboard_container">
            <div class="drawer_section">
                <?php include "./../../View/Shared/dashboardDrawer.php" ?>
            </div>

            <div class="dashboard_content_section">
                <div>
                    <h1>Add Course Content</h1>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <?php
                        // Check if user is logged in and session email is set
                        if (isset($_SESSION['email'])) {
                            // Prepare and execute SQL query to get course names where instructor_email matches session email
                            $query = "SELECT course_name, course_id FROM courses WHERE instructor_email = :instructor_email";
                            $stmt = oci_parse($conn, $query);
                            oci_bind_by_name($stmt, ':instructor_email', $_SESSION['email']);
                            oci_execute($stmt);

                            // Create dropdown of course names
                            echo '<label for="course_name">Course Name:</label>';
                            echo '<select name="course_id" required>';
                            while ($row = oci_fetch_assoc($stmt)) {
                                echo '<option value="' . $row['COURSE_ID'] . '">' . $row['COURSE_NAME'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                        <br>

                        <label for="total_modules">Total Modules:</label>
                        <input type="number" name="total_modules" required><br>

                        <label for="module_number">Module Number:</label>
                        <input type="number" name="module_number" required><br>

                        <label for="module_name">Module Name:</label>
                        <input type="text" name="module_name" required><br>

                        <label for="lecture_video_links">Lecture Video Links (comma separated):</label>
                        <input type="text" name="lecture_video_links" required><br>

                        <label for="total_lectures">Total Lectures:</label>
                        <input type="number" name="total_lectures" required><br>

                        <label for="lecture_name">Lecture Name:</label>
                        <input type="text" name="lecture_name" required><br>

                        <label for="lecture_description">Lecture Description:</label>
                        <textarea name="lecture_description" required></textarea><br>

                        <label for="lecture_number">Lecture Number:</label>
                        <input type="number" name="lecture_number" required><br>

                        <input type="submit" value="Add Course Content">
                    </form>

                    <?php
                    // Check if form is submitted
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Validate input
                        $errors = [];

                        if (!isset($_POST['course_id']) || empty($_POST['course_id'])) {
                            $errors[] = 'Course Name is required.';
                        }

                        if (!isset($_POST['total_modules']) || empty($_POST['total_modules'])) {
                            $errors[] = 'Total Modules is required.';
                        }

                        if (!isset($_POST['module_number']) || empty($_POST['module_number'])) {
                            $errors[] = 'Module Number is required.';
                        }

                        if (!isset($_POST['module_name']) || empty($_POST['module_name'])) {
                            $errors[] = 'Module Name is required.';
                        }

                        if (!isset($_POST['lecture_video_links']) || empty($_POST['lecture_video_links'])) {
                            $errors[] = 'Lecture Video Links are required.';
                        }

                        if (!isset($_POST['total_lectures']) || empty($_POST['total_lectures'])) {
                            $errors[] = 'Total Lectures is required.';
                        }

                        if (!isset($_POST['lecture_name']) || empty($_POST['lecture_name'])) {
                            $errors[] = 'Lecture Name is required.';
                        }

                        if (!isset($_POST['lecture_description']) || empty($_POST['lecture_description'])) {
                            $errors[] = 'Lecture Description is required.';
                        }

                        if (!isset($_POST['lecture_number']) || empty($_POST['lecture_number'])) {
                            $errors[] = 'Lecture Number is required.';
                        }

                        // Display errors if any
                        if (!empty($errors)) {
                            echo '<ul>';
                            foreach ($errors as $error) {
                                echo '<li>' . $error . '</li>';
                            }
                            echo '</ul>';
                        } else {

                            // echo $_POST['course_id'];
                            // Insert data into course_content table
                            $query = "INSERT INTO course_content (course_id, totalModule, moduleNumber, moduleName, lectureVideoLinks, totalLecture, lectureName, lectureDescription, lectureNumber) VALUES (:course_id, :total_modules, :module_number, :module_name, :lecture_video_links, :total_lectures, :lecture_name, :lecture_description, :lecture_number)";
                            $stmt = oci_parse($conn, $query);
                            oci_bind_by_name($stmt, ':course_id', $course_id);
                            oci_bind_by_name($stmt, ':total_modules', $total_modules);
                            oci_bind_by_name($stmt, ':module_number', $module_number);
                            oci_bind_by_name($stmt, ':module_name', $module_name);
                            oci_bind_by_name($stmt, ':lecture_video_links', $lecture_video_links);
                            oci_bind_by_name($stmt, ':total_lectures', $total_lectures);
                            oci_bind_by_name($stmt, ':lecture_name', $lecture_name);
                            oci_bind_by_name($stmt, ':lecture_description', $lecture_description);
                            oci_bind_by_name($stmt, ':lecture_number', $lecture_number);

                            // Add the lengths of the variables for correct binding
                            oci_bind_by_name($stmt, ':course_id', $course_id, 255);
                            oci_bind_by_name($stmt, ':total_modules', $total_modules, 255);
                            oci_bind_by_name($stmt, ':module_number', $module_number, 255);
                            oci_bind_by_name($stmt, ':module_name', $module_name, 100);
                            oci_bind_by_name($stmt, ':lecture_video_links', $lecture_video_links, 255);
                            oci_bind_by_name($stmt, ':total_lectures', $total_lectures, 255);
                            oci_bind_by_name($stmt, ':lecture_name', $lecture_name, 255);
                            oci_bind_by_name($stmt, ':lecture_description', $lecture_description, 255);
                            oci_bind_by_name($stmt, ':lecture_number', $lecture_number, 255);


                            // Set parameters and execute statement
                            $course_id = $_POST['course_id']; // Use the selected course name as the course_id
                            $total_modules = $_POST['total_modules'];
                            $module_number = $_POST['module_number'];
                            $module_name = $_POST['module_name'];
                            $lecture_video_links = $_POST['lecture_video_links'];
                            $total_lectures = $_POST['total_lectures'];
                            $lecture_name = $_POST['lecture_name'];
                            $lecture_description = $_POST['lecture_description'];
                            $lecture_number = $_POST['lecture_number'];

                            if (oci_execute($stmt)) {
                                echo "New course content added successfully.";
                            } else {
                                echo "Error: Failed to add course content.";
                            }

                            oci_free_statement($stmt);
                        }
                    }

                    // Close the database connection
                    oci_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </body>


    </html>