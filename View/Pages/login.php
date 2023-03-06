<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpace</title>
    <link rel="stylesheet" href="./../../View/styles.css">
</head>

<body>
    <?php
    // Define variables and initialize with empty values
    $name = $email = $phone = $website = $gender = "";
    $nameErr = $emailErr = $phoneErr = $websiteErr = $genderErr = "";

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the Name field
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $_SESSION["name"] = $_POST["name"];
        }

        // Validate the Email field
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate the Phone field
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
            // Check if phone number only contains numbers and dashes
            if (!preg_match("/^[0-9-]+$/", $phone)) {
                $phoneErr = "Invalid phone number format";
            }
        }

        // Validate the Website field
        if (empty($_POST["website"])) {
            $websiteErr = "";
        } else {
            $website = test_input($_POST["website"]);
            // Check if website URL address is well-formed
            if (!filter_var($website, FILTER_VALIDATE_URL)) {
                $websiteErr = "Invalid website URL format";
            }
        }

        // Validate the Gender field
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    // Function to sanitize and validate input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="login-container">
        <div class="container">
            <div class="login-inside">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div>
                        <fieldset>
                            <legend>
                                <h3>Get Connected</h3>
                            </legend>
                        </fieldset>
                    </div>
                    <p>
                        <label for="name">Name:</label> <br>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                        <span class="error">
                            <?php echo $nameErr; ?>
                        </span>
                    </p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                        <span class="error">
                            <?php echo $emailErr; ?>
                        </span>
                    </p> <br />
                    <p>
                        <input type="submit" name="submit" value="Submit">
                        <span class="success">
                            <?php if (empty($nameErr) && empty($emailErr)) {
                                ?>
                                <p class="success">
                                    Session variables are set
                                </p>
                                <?php
                            } else {
                                ?>
                                <p class="error">
                                    Session variables are not set
                                </p>
                                <?php
                            }
                            ?>
                        </span>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <?php include "./../../View/Shared/Footer.php" ?>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>