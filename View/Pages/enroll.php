<?php
session_start();
include('../../Controller/db_connect.php');

$courseId = $_GET['enroll'];
if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];

    $checkSql = "SELECT * FROM enrolled_courses WHERE user_email = '$userEmail' AND course_id = '$courseId'";
    $checkResult = oci_parse($conn, $checkSql);
    oci_execute($checkResult);
    echo $courseId;
    echo $userEmail;


    if (oci_fetch($checkResult)) {
        // User is already enrolled in the course
        $_SESSION['enrollErr'] = "You are already enrolled in this course.";

        header("Location: showCourse.php?course_id=$courseId");
    } else {
        // Prepare the procedure call
        $enrollProcedure = "BEGIN enroll_user_in_course(:user_email, :course_id); END;";
        $enrollStmt = oci_parse($conn, $enrollProcedure);

        // Bind the parameters
        oci_bind_by_name($enrollStmt, ':user_email', $userEmail);
        oci_bind_by_name($enrollStmt, ':course_id', $courseId);

        // Execute the procedure
        oci_execute($enrollStmt);

        // Close the statement and connection
        oci_free_statement($enrollStmt);
        oci_close($conn);


        if ($enrollStmt) {
            // Enrollment successful
            $_SESSION['enrollErr'] = "Enrollment successful.";
            header("Location: showCourse.php?course_id=$courseId");
        } else {
            // Error occurred
            $_SESSION['enrollErr'] = "Enrollment failed.";
            header("Location: showCourseDetails.php?course_id=$courseId");
        }
    }
} else {
    echo "Login";
    header("Location: login.php");
}
?>