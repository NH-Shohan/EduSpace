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
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>

        <div class="dashboard_content_section">

            <?php if (isset($_SESSION['email']) && $_SESSION['email'] == "") { ?>
                <b>Nothing</b>
            <?php } ?>
            <!-- teacher -->
            <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 'teacher') { ?>
                <table class="customers">
                    <tr>
                        <th>Course Name</th>
                        <th>Student Name</th>
                        <th>Description</th>
                        <th>...</th>
                    </tr>
                    <?php
                    $userMail = $_SESSION['email'];
                    include('../../Controller/db_connect.php');
                    $sql = "SELECT * FROM courses WHERE instructor_email = '$userMail'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                     <td>' . $row["course_name"] . '</td>
                                     <td>' . $row["instructor_email"] . '</td>
                                     <td>' . $row["description"] . '</td>
                                     <td><button><a href="showCourseDetails.php?course_id=' . $row["course_id"] . '">Show</a></button></td>
                                 </tr>';
                            }
                        }
                    }
                    ?>

                </table>
            <?php } ?>




            <!--  -->




            <!-- admin -->
            <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin') { ?>
                <div>
                    <div>
                        <table class="customers">
                            <tr>
                                <th>Course Name</th>
                                <th>Student Name</th>
                                <th>Enrolled In</th>
                                <th>...</th>
                            </tr>
                            <?php
                            include('../../Controller/db_connect.php');
                            $sql = "SELECT c.course_id, c.course_name, u.username, ec.date
                FROM enrolled_courses ec
                JOIN courses c ON ec.course_id = c.course_id
                JOIN users u ON ec.user_email = u.email;
                ";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                <td>' . $row["course_name"] . '</td>
                                <td>' . $row["username"] . '</td>
                                <td>' . $row["date"] . '</td>
                                <td><button><a href="showCourseDetails.php?course_id=' . $row["course_id"] . '">Show</a></button></td>
                                </tr>';
                                    }
                                }
                            }
                            ?>

                        </table>
                    </div>
                    <!-- 2nd table -->
                    <div>
                        <table class="customers">
                            <tr>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Course Name</th>
                                <th>Course Category</th>
                                <th>...</th>
                            </tr>
                            <?php
                            include('../../Controller/db_connect.php');
                            $sql = "SELECT * from courses;
                ";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                <td>' . $row["instructor_name"] . '</td>
                                <td>' . $row["instructor_email"] . '</td>
                                <td>' . $row["rating"] . '</td>
                                <td>' . $row["course_name"] . '</td>
                                <td>' . $row["course_category"] . '</td>
                                </tr>';
                                    }
                                }
                            }
                            ?>

                        </table>
                    </div>
                </div>

            <?php } ?>

            <!--  -->


            <!-- student -->
            <table class="customers">

                <?php
                if (isset($_SESSION['email']) && $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'teacher') {

                    ?>
                    <tr>
                        <th>Course Name</th>
                        <th>Instructor Name</th>
                        <th>Enrolled In</th>
                        <th>...</th>

                    </tr>

                    <?php
                    $userMail = $_SESSION['email'];
                    include('../../Controller/db_connect.php');

                    $sql = "SELECT courses.course_id, courses.course_name, courses.instructor_name, enrolled_courses.date
                    FROM enrolled_courses
                    JOIN courses ON enrolled_courses.course_id = courses.course_id
                    WHERE enrolled_courses.user_email = '$userMail ';";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                    <td>' . $row["course_name"] . '</td>
                                    <td>' . $row["instructor_name"] . '</td>
                                    <td>' . $row["date"] . '</td>
                                    <td><button><a href="showCourseDetails.php?course_id=' . $row["course_id"] . '">Show</a></button></td>
                                    </tr>';
                            }
                        }
                    }
                }

                ?>

            </table>

            <!--  -->
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>