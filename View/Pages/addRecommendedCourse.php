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
    <title>Document</title>
</head>

<body>
    <?php
    // Connect to the database
    
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $course_id = $_POST['course_id'];

            // Insert the course_id into the recommended_courses table
            $query = "INSERT INTO recommended_courses (course_id) VALUES (?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $course_id);
            mysqli_stmt_execute($stmt);

            // Check if the insert was successful
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo 'Course added as a recommended course.';
            } else {
                echo 'Failed to add course as a recommended course';
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // check for duplicate key error code
                echo "Course already exists as recommended course";
            } else {
                echo "An error occurred: " . $e->getMessage();
            }
        }

    }

    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="course_id">Select a course to recommend:</label>
        <select name="course_id" id="course_id">
            <?php
            // Connect to the database
            
            // Query the courses table
            $query = "SELECT course_id, course_name FROM courses";
            $result = mysqli_query($conn, $query);

            // Loop through the results and create an option for each course
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['course_id'] . '">' . $row['course_name'] . '</option>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </select>
        <button type="submit">Add Recommended Course</button>
    </form>
</body>

</html>