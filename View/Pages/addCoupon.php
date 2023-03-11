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
    <link rel="stylesheet" href="./../../View/styles.css">
    <style>
        .heading {
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

        .add_coupon form {
            difdisplay: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .add_coupon form input {
            width: 100%;
            border-radius: 4px;
            padding: 7px 10px;
            font-size: 15px;
            outline: none;
            margin-bottom: 20px;
            border-top: none;
            border-right: none;
            border-bottom: 2px solid var(--secondaryText2);
        }

        .add_coupon form input:hover,
        .add_coupon form input:focus {
            border-bottom: 2px solid var(--text);
        }

        .add_coupon form .add_button {
            padding: 9px;
            background-color: var(--tertiary);
            border: none;
            border-radius: 7px;
            width: 30%;
            cursor: pointer;
            color: var(--primary);
            font-weight: 500;
            font-size: 15px;
            border-bottom: 3px solid var(--secondaryText2);
            transition: 200ms;
        }

        .add_coupon form .add_button:hover {
            border-bottom: 3px solid var(--tertiary);
            background-color: var(--text);
        }

        .delete_button {
            padding: 9px;
            background-color: var(--tertiary);
            border: none;
            border-radius: 7px;
            width: 30%;
            cursor: pointer;
            color: var(--primary);
            font-weight: 500;
            font-size: 15px;
            border-bottom: 3px solid var(--secondaryText2);
            transition: 200ms;
        }

        .delete_button:hover {
            background-color: #ff3333;
            border-bottom: 3px solid red;
        }

        .add_coupon form select {
            padding: 10px 20px;
            background-color: var(--primary);
            border: none;
            border-bottom: 2px solid var(--secondaryText2);
            border-radius: 4px;
            margin-block: 30px;
            outline: none;
        }

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

        .dashboard_quick_links .drawer_nav_link:hover {
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
    <title>Coupon Management</title>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>

        <div class="dashboard_content_section">
            <div class="add_coupon">

                <form method="post">
                    <h1 class="heading" for="new_coupon_code">NEW COUPON CODE:</h1>
                    <input type="text" id="new_coupon_code" name="new_coupon_code">
                    <button class="add_button" type="submit">Add Coupon</button>
                </form>

                <br />

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
                    <button class="delete_button" type="submit">Delete Coupon</button>
                </form>
            </div>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>


</body>

</html>