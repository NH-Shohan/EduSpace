<!-- PHP code for login and register -->
<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// Create a connection object
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SESSION["authEvent"] == "logout") {
    setcookie("loggedUser", "", time() - 3600, "/");
    $_SESSION['name'] = "";
    $_SESSION["authEvent"] == "";
    // header("Location: index.php");
    echo "logged out";
}
// echo $_SESSION["authEvent"];
// Check if the user submitted the login form
if ($_SESSION["authEvent"] == "login") {
    if (
        isset($_SESSION['username']) && isset($_SESSION['password'])
    ) {
        // Get user input from $_POST superglobal array
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        // Prepare a SQL statement to select user data from the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        echo $email;
        // Execute the SQL statement and store the result in a variable
        $result = mysqli_query($conn, $sql);
        // echo $result;

        // Check if the result contains any rows
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data as an associative array
            $user = mysqli_fetch_assoc($result);

            // Verify the password using password_verify() function
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a session and store user data in $_SESSION superglobal array
                // session_start();
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];

                // Redirect to a welcome page

                $_SESSION["authEvent"] = "";
                setcookie("loggedUser", $email, time() + 86400, "/");
                header("Location: welcome.php");
            } else {
                // Password is incorrect, display an error message
                header("Location: ./../View/Pages/login.php?error=Wrong password.");
                echo "Wrong password.";
            }
        } else {
            // No user found with that username, display an error message
            header("Location: ./../View/Pages/login.php?error=No user found with that email.");
            echo "No user found with that email.";
        }
    }
}

// Check if the user submitted the registration form
if (
    isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['username']) && isset($_SESSION['password']) &&
    $_SESSION["authEvent"] == "registration"
) {
    // Get user input from $_POST superglobal array
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $form_data = $_SESSION;

    // Validate user input using empty() function and filter_var() function for email validation 
    if (empty($name)) {
        $nameError = "Name is required.";
        // header("Location: ./../View/Pages/registration.php?error=true&nameError=$nameError&" . http_build_query($form_data));
    } elseif (empty($email)) {
        $emailError = "Email is required.";
        // header("Location: ./../View/Pages/registration.php?error=true&emailError=$emailError&" . http_build_query($form_data));
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        // header("Location: ./../View/Pages/registration.php?error=true&emailError=$emailError&" . http_build_query($form_data));
    } elseif (empty($username)) {
        $usernameError = "Username is required.";
        // header("Location: ./../View/Pages/registration.php?error=true&usernameError=$usernameError&" . http_build_query($form_data));
    } elseif (empty($password)) {
        $passwordError = "Password is required.";
        // header("Location: ./../View/Pages/registration.php?error=true&passwordError=$passwordError&");
    } else {
        // User input is valid, hash the password using password_hash() function with default algorithm 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare a SQL statement to insert user data into the database 
        $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hashed_password')";

        // Execute the SQL statement and check if it was successful 
        if (mysqli_query($conn, $sql)) {
            // User data inserted successfully, display a success message 

            $_SESSION["authEvent"] = "";
            echo "User registered successfully.";
            setcookie("loggedUser", $email, time() + 86400, "/");

        } else {
            // User data insertion failed, display an error message 
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close the connection
mysqli_close($conn);
?>