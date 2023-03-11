<?php
session_start();

require_once './../../Controller/db_connect.php';

$course_id = $_GET['course_id'];
$sql = "SELECT * FROM login_system.course_content WHERE course_id = $course_id ORDER BY moduleNumber, lectureNumber";
$result = mysqli_query($conn, $sql);
$modules = array();
$banner = "";
$courseName = "";
$description = "";
$courseFee = 0;
$noContent = false;

// Select data from the courses table where course_id is 1
$sql2 = "SELECT * FROM courses WHERE course_id = $course_id";
$result2 = $conn->query($sql2);

// Display the selected data
if ($result2->num_rows > 0) {
    // Output data of each row
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $banner = $row2["course_image"];
        $courseName = $row2["course_name"];
        $courseFee = $row2["course_fee"];
        $description = $row2["description"];
        // And so on for the other columns in the table
    }
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $module_id = $row['moduleNumber'];
        // $banner = $row['course_image'];
        if (!isset($modules[$module_id])) {
            $modules[$module_id] = array(
                'name' => $row['moduleName'],
                'lectures' => array(),
            );
        }

        $modules[$module_id]['lectures'][] = array(
            'name' => $row['lectureName'],
            'lectureDescription' => $row['lectureDescription'],
            'url' => $row['lectureVideoLinks'],
        );
    }
} else {
    $noContent = true;
}
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
    $discounted_price = $courseFee;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $coupon_code = $_POST["coupon_code"];


        $coupons = file("coupons.txt", FILE_IGNORE_NEW_LINES);

        if (in_array($coupon_code, $coupons)) {
            // Coupon code matched, apply 20% discount
            $discounted_price = $courseFee * 0.8;
        } else {
            // Coupon code did not match
            echo "Sorry, your coupon code was incorrect.";
        }
    }

    ?>

    <h1>Course Price:
        <?php echo $discounted_price; ?>
    </h1>
    <form method="post">
        <label for="coupon_code">Coupon Code:</label>
        <input type="text" id="coupon_code" name="coupon_code">
        <button type="submit">Apply Coupon</button>
    </form>

</body>

</html>