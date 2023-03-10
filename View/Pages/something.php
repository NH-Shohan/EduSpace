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
    <style>

    </style>
</head>

<body>
    <?php

    // Query the database for course content
    $course_id = $_GET['course_id'];
    $sql = "SELECT * FROM login_system.course_content WHERE course_id = $course_id ORDER BY moduleNumber, lectureNumber";
    try {
        $result = mysqli_query($conn, $sql);

        // Initialize variables for module tracking
        $currentModule = null;
        $moduleStarted = false;

        // Loop through the results and display the course content
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display module header if necessary
                if ($row['moduleNumber'] != $currentModule) {
                    if ($moduleStarted) {
                        echo "</ul></div>";
                    }
                    echo "<h2>{$row['moduleName']}</h2><div><ul>";
                    $currentModule = $row['moduleNumber'];
                    $moduleStarted = true;
                }

                // Display lecture details
                echo "<li>{$row['lectureName']}</li>";
                echo "<ul>";
                $videoLinks = explode(",", $row['lectureVideoLinks']);
                foreach ($videoLinks as $link) {
                    // echo "<li><a href=\"$link\">$link</a></li>";
                    echo '<iframe width="560" height="315" src="' . $link . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                }
                echo "<li>{$row['lectureDescription']}</li>";
                echo "</ul>";
            } // Close final module if necessary
            if ($moduleStarted) {
                echo "</ul></div>";
            }
        } else {
            echo "no content available";

        }


    } catch (\Throwable $th) {
        echo "no content available";
    }

    ?>


</body>

</html>