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
            /* display: flex; */
            /* justify-content: center;
            align-items: center; */
            padding: 20px;
        }
    </style>
    <style>
        .customers {
            width: 100%;
            border-collapse: collapse;
        }

        .customers th,
        .customers td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .customers th {
            background-color: #f2f2f2;
        }

        .customers tr:hover {
            background-color: #f5f5f5;
        }

        .customers button {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .customers button a {
            text-decoration: none;
            color: white;
        }

        .customers button:hover {
            background-color: #45a049;
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
                    $sql = "SELECT * FROM courses WHERE instructor_email = :userMail";
                    $stmt = oci_parse($conn, $sql);
                    oci_bind_by_name($stmt, ":userMail", $userMail);
                    oci_execute($stmt);

                    while ($row = oci_fetch_assoc($stmt)) {
                        echo '<tr>
                <td>' . $row["COURSE_NAME"] . '</td>
                <td>' . $row["INSTRUCTOR_EMAIL"] . '</td>
                <td>';
                        // Read the LOB data for Description
                        $lob = $row["DESCRIPTION"];
                        if (!is_null($lob)) {
                            $size = oci_field_size($stmt, 'DESCRIPTION');
                            $description = oci_lob_read($lob, $size);
                            echo $description;
                        }
                        echo '</td>
                <td><button><a href="showCourse.php?course_id=' . $row["COURSE_ID"] . '">Show</a></button></td>
            </tr>';
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
                            $sql = "SELECT c.course_id, c.course_name, u.username, ec.enroll_date
                            FROM enrolled_courses ec
                            JOIN courses c ON ec.course_id = c.course_id
                            JOIN users u ON ec.user_email = u.email";
                            $stmt = oci_parse($conn, $sql);
                            oci_execute($stmt);



                            while ($row = oci_fetch_assoc($stmt)) {
                                echo '<tr>
                <td>' . $row["COURSE_NAME"] . '</td>
                <td>' . $row["USERNAME"] . '</td>
                <td>' . $row["ENROLL_DATE"] . '</td>
                <td><button><a href="showCourse.php?course_id=' . $row["COURSE_ID"] . '">Show</a></button></td>
            </tr>';
                            }
                            ?>
                        </table>

                    </div>
                    <!-- 2nd table -->
                    <br>
                    <br>
                    <br>

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
                            $sql = "SELECT * FROM courses";
                            $stmt = oci_parse($conn, $sql);
                            oci_execute($stmt);

                            while ($row = oci_fetch_assoc($stmt)) {
                                echo '<tr>
                        <td>' . $row["INSTRUCTOR_NAME"] . '</td>
                        <td>' . $row["INSTRUCTOR_EMAIL"] . '</td>
                        <td>' . $row["RATING"] . '</td>
                        <td>' . $row["COURSE_NAME"] . '</td>
                        <td>' . $row["COURSE_CATEGORY"] . '</td>
                        <td><button><a href="showCourse.php?course_id=' . $row["COURSE_ID"] . '">Show</a></button></td>
                    </tr>';
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
                    $sql = "SELECT c.course_id, c.course_name, c.instructor_name, ec.enroll_date
                FROM enrolled_courses ec
                JOIN courses c ON ec.course_id = c.course_id
                WHERE ec.user_email = :user_email";
                    $stmt = oci_parse($conn, $sql);
                    oci_bind_by_name($stmt, ':user_email', $userMail);
                    oci_execute($stmt);

                    while ($row = oci_fetch_assoc($stmt)) {
                        echo '<tr>
                <td>' . $row["COURSE_NAME"] . '</td>
                <td>' . $row["INSTRUCTOR_NAME"] . '</td>
                <td>' . $row["ENROLL_DATE"] . '</td>
                <td><button><a href="showCourseDetails.php?course_id=' . $row["COURSE_ID"] . '">Show</a></button></td>
            </tr>';
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