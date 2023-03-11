<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!file_exists("coupons.txt")) {
        $file = fopen("coupons.txt", "w");
        fclose($file);
    }
    if (isset($_POST["new_coupon_code"])) {
        $new_coupon_code = $_POST["new_coupon_code"];

        if (!empty(trim($new_coupon_code))) {
            $coupons = file("coupons.txt", FILE_IGNORE_NEW_LINES);
            if (!in_array($new_coupon_code, $coupons)) {
                $file = fopen("coupons.txt", "a");
                fwrite($file, $new_coupon_code . "\n");
                fclose($file);
                echo "Coupon code added successfully.";
            } else {
                echo "Coupon code already exists.";
            }
        } else {
            echo "Coupon code cannot be empty.";
        }
    } else if (isset($_POST["delete_coupon_code"])) {
        $delete_coupon_code = $_POST["delete_coupon_code"];

        $coupons = file("coupons.txt", FILE_IGNORE_NEW_LINES);

        if (!empty($delete_coupon_code) && in_array($delete_coupon_code, $coupons)) {
            if (($key = array_search($delete_coupon_code, $coupons)) !== false) {
                unset($coupons[$key]);
                $file = fopen("coupons.txt", "w");
                foreach ($coupons as $coupon) {
                    fwrite($file, $coupon . "\n");
                }
                fclose($file);
                echo "Coupon code deleted successfully.";
            } else {
                echo "Sorry, there was an error deleting the coupon code.";
            }
        } else {
            echo "Please select a valid coupon code to delete.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Management</title>
</head>

<body>

    <h1>Coupon Management</h1>

    <form method="post">
        <label for="new_coupon_code">New Coupon Code:</label>
        <input type="text" id="new_coupon_code" name="new_coupon_code">
        <button type="submit">Add Coupon</button>
    </form>

    <form method="post">
        <label for="delete_coupon_code">Select Coupon Code to Delete:</label>
        <select id="delete_coupon_code" name="delete_coupon_code">
            <?php
            $coupons = file("coupons.txt", FILE_IGNORE_NEW_LINES);
            foreach ($coupons as $coupon) {
                echo "<option value='$coupon'>$coupon</option>";
            }
            ?>
        </select>
        <button type="submit">Delete Coupon</button>
    </form>

</body>

</html>