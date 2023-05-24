<?php
session_start();
// Check if success or error message is set
if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the success message after displaying
}

require_once './../../Controller/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon Link -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./../../View/styles.css">
    <style>
        .heading h1 {
            margin-bottom: 1em;
            color: var(--text);
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

        .dashboard_input_container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5%;
        }

        .dashboard_left_side_input input,
        .dashboard_right_side_input input,
        .dashboard_right_side_input textarea {
            width: 100%;
            border-radius: 4px;
            padding: 7px 10px;
            font-size: 14px;
            outline: none;
            margin-bottom: 20px;
            border-top: none;
            border-right: none;
            border-bottom: 2px solid var(--secondaryText2);
            resize: vertical;
        }

        .dashboard_left_side_input input:hover,
        .dashboard_left_side_input input:focus,
        .dashboard_right_side_input input:hover,
        .dashboard_right_side_input input:focus,
        .dashboard_right_side_input textarea:hover,
        .dashboard_right_side_input textarea:focus {
            border-bottom: 2px solid var(--text);
        }

        .dashboard_right_side_input button {
            padding: 9px;
            background-color: var(--tertiary);
            border: none;
            border-radius: 7px;
            width: 100%;
            cursor: pointer;
            color: var(--primary);
            font-weight: 500;
            font-size: 15px;
            border-bottom: 2px solid var(--secondaryText2);
            transition: 200ms;
        }

        .dashboard_right_side_input button:hover {
            border-bottom: 2px solid var(--tertiary);
            background-color: var(--text);
        }


        /* Dashboard Navbar Section */
        .dashboard_quick_links {
            color: var(--primary);
            height: 100%;
            padding: 20px;
            box-shadow: 0px 0px 5px var(--secondaryText2);
        }

        .dashboard_quick_links .drawer_nav_link {
            display: block;
            text-decoration: none;
            margin-block: 10px;
            background-color: var(--tertiary);
            padding: 10px;
            border-radius: 10px;
            font-weight: 500;
            color: var(--primary);
            transition: 200ms;
        }

        .dashboard_quick_links .drawer_nav_link:hover,
        {
        background-color: var(--text);
        }

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
        }
    </style>
    <title>EduSpace</title>
</head>

<?php

// Initialize variables
$course_id = "";
$course_name = "";
$course_image = "";
$course_category = "";
$instructor_name = "";
$instructor_email = "";
$rating = "";
$description = "";
$course_modules = "";
$course_fee = "";
$success_message = "";
$error_message = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_image = $_POST['course_image'];
    $course_category = $_POST['course_category'];
    $instructor_name = $_POST['instructor_name'];
    $instructor_email = $_POST['instructor_email'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $course_modules = $_POST['course_modules'];
    $course_fee = $_POST['course_fee'];

    echo "value";
    echo $course_id;
    // Validate and sanitize the input if needed
    // ...

    // Perform the database update query
    $query = "UPDATE courses SET course_name = :course_name, course_image = :course_image, course_category = :course_category, instructor_name = :instructor_name, instructor_email = :instructor_email, rating = :rating, description = :description, course_modules = :course_modules, course_fee = :course_fee WHERE course_id = :course_id";
    $stmt = oci_parse($conn, $query);

    // Bind the parameters
    oci_bind_by_name($stmt, ":course_name", $course_name);
    oci_bind_by_name($stmt, ":course_image", $course_image);
    oci_bind_by_name($stmt, ":course_category", $course_category);
    oci_bind_by_name($stmt, ":instructor_name", $instructor_name);
    oci_bind_by_name($stmt, ":instructor_email", $instructor_email);
    oci_bind_by_name($stmt, ":rating", $rating);
    oci_bind_by_name($stmt, ":description", $description);
    oci_bind_by_name($stmt, ":course_modules", $course_modules);
    oci_bind_by_name($stmt, ":course_fee", $course_fee);
    oci_bind_by_name($stmt, ":course_id", $course_id);

    $result = oci_execute($stmt);

    if ($result) {

        $error_message = "Course updated successfully.";
        // $_SESSION['success_message'] = "Course updated successfully.";
        // header("Location: " . $_SERVER['PHP_SELF']);
        // exit();
    } else {
        $error_message = "Error updating course. Please try again: " . oci_error($stmt)['message'];
    }
}

// Fetch the courses from the database for the dropdown
$courses_query = "SELECT course_id, course_name FROM courses";
$courses_stmt = oci_parse($conn, $courses_query);
oci_execute($courses_stmt);
?>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>
        <div class="dashboard_content_section">
            <form method="post">
                <div class="heading">
                    <h1>UPDATE COURSE</h1>
                </div>
                <select id="course_id" name="course_id">
                    <option value="">Select a course</option>
                    <?php
                    // Loop through the courses and populate the dropdown
                    while ($course_row = oci_fetch_assoc($courses_stmt)) {
                        $selected = ($course_row['COURSE_ID'] == $course_id) ? 'selected' : '';
                        echo '<option value="' . $course_row['COURSE_ID'] . '" ' . $selected . '>' . $course_row['COURSE_NAME'] . '</option>';
                    }
                    ?>
                </select>

                <div class="dashboard_input_container">
                    <div class="dashboard_left_side_input">
                        <label for="course_name">Course name:</label>
                        <input class="dashboard_input_field" type="text" id="course_name" name="course_name" required
                            value="<?php echo $course_name; ?>">
                        <br>

                        <label for="course_image">Course image URL:</label>
                        <input type="text" id="course_image" name="course_image" value="<?php echo $course_image; ?>">
                        <br>

                        <label for="course_category">Course category:</label>
                        <input type="text" id="course_category" name="course_category" required
                            value="<?php echo $course_category; ?>">
                        <br>

                        <label for="instructor_name">Instructor name:</label>
                        <input type="text" id="instructor_name" name="instructor_name" required
                            value="<?php echo $instructor_name; ?>">
                        <br>

                        <label for="instructor_email">Instructor email:</label>
                        <input type="email" id="instructor_email" name="instructor_email" required
                            value="<?php echo $instructor_email; ?>">
                        <br>

                        <label for="rating">Rating:</label>
                        <input type="number" id="rating" name="rating" min="0" max="5" step="0.1"
                            value="<?php echo $rating; ?>">
                        <br>
                    </div>

                    <div class="dashboard_right_side_input">
                        <label for="description">Course description:</label>
                        <textarea id="description" name="description" rows="5" cols="30"
                            required><?php echo $description; ?></textarea>
                        <br>

                        <label for="course_modules">Course modules:</label>
                        <textarea id="course_modules" name="course_modules" rows="5" cols="30"
                            required><?php echo $course_modules; ?></textarea>
                        <br>

                        <label for="course_fee">Course fee:</label>
                        <input type="number" id="course_fee" name="course_fee" min="0" step="0.01"
                            value="<?php echo $course_fee; ?>">
                        <br>

                        <input type="hidden" id="hidden_course_id" name="course_id" value="<?php echo $course_id; ?>">
                        <button type="submit">Update course</button>
                    </div>
                    <!-- Display the success message -->
                    <?php if (isset($successMessage)): ?>
                        <div class="success">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error_message)): ?>
                        <div class="error_message error">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script>
        // Update hidden input field with the selected course ID
        document.getElementById('course_id').addEventListener('change', function () {
            var selectedCourseId = this.value;
            document.getElementById('hidden_course_id').value = selectedCourseId;
        });
    </script>
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>








</html>