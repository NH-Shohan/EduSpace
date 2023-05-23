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
        // User is not enrolled in the course, proceed with enrollment
        $enrollSql = "INSERT INTO enrolled_courses (id, user_email, course_id, enroll_date) VALUES (enrolled_courses_seq.NEXTVAL, '$userEmail', '$courseId', SYSDATE)";
        $enrollResult = oci_parse($conn, $enrollSql);
        oci_execute($enrollResult);

        if ($enrollResult) {
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