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