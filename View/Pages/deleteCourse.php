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

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>

        <div class="dashboard_content_section">
            <div>
                <h1>Delete Course</h1>
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
                    <br>
                    <input type="submit" value="Delete Course">
                </form>

                <?php
                // Check if form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Delete the selected course from the database
                    $course_id = $_POST['course_id'];

                    // Prepare the function call
                    $sql = "BEGIN :result := execute_delete_course(:course_id); END;";
                    $stmt = oci_parse($conn, $sql);
                    oci_bind_by_name($stmt, ":result", $result, 100, SQLT_CHR);
                    oci_bind_by_name($stmt, ":course_id", $course_id);

                    if (oci_execute($stmt)) {
                        // Redirect to the same page to reload course names
                        $_SESSION['success_message'] = "Course deleted successfully.";
                        header("Location: " . $_SERVER['PHP_SELF']);

                        exit();
                    } else {
                        echo "Error: Failed to delete course.";
                    }

                    oci_free_statement($stmt);
                }

                // Close the database connection
                oci_close($conn);
                ?>



                <!-- Display the success message -->
                <?php if (isset($successMessage)): ?>
                    <div class="success">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>



</html>