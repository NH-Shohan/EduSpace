<!-- PHP code for login and register -->
<?php
// session_save_path('/tmp/sessions');
session_start();

// Database connection parameters
require_once 'db_connect.php';

// Function to encrypt data
function encrypt($data, $key)
{
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

    // Encrypt the data using AES-256-CBC encryption with the provided key and initialization vector
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

    // Prepend the initialization vector to the encrypted data
    $encryptedDataWithIV = $iv . $encryptedData;

    // Base64-encode the encrypted data with the initialization vector and return it
    return base64_encode($encryptedDataWithIV);
}


// Function to decrypt data
function decrypt($data, $key)
{
    // Decode the base64-encoded data
    $encryptedDataWithIV = base64_decode($data);

    // Extract the initialization vector and encrypted data from the decoded data
    $iv = substr($encryptedDataWithIV, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = substr($encryptedDataWithIV, openssl_cipher_iv_length('aes-256-cbc'));

    // Decrypt the data using AES-256-CBC decryption with the provided key and initialization vector
    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

    // Return the decrypted data
    return $decryptedData;
}


function setDataCookie($user)
{
    $userData = array();
    foreach ($user as $key => $value) {
        if ($key != 'password') {
            $userData[$key] = $value;
        }
    }
    $encryptedData = encrypt(json_encode($userData), 'secret_key');
    $secureFlag = true;
    $httpOnlyFlag = true;

    // Cookie set
    setcookie("loggedUser", $encryptedData, time() + 86400, "/", "", $secureFlag, $httpOnlyFlag);
}

// Login/Logout/Registration authentication
if ($_SESSION["authEvent"] == "logout") {
    setcookie("loggedUser", "", time() - 3600, "/");
    $_SESSION['name'] = "";
    $_SESSION['role'] = "";
    $_SESSION["authEvent"] == "";
    session_destroy();
    header("Location: ./../index.php");
}
// echo $_SESSION["authEvent"];
// Check if the user submitted the login form
if ($_SESSION["authEvent"] == "login") {
    if (
        isset($_SESSION['email']) && isset($_SESSION['password'])
    ) {
        // Get user input from $_SESSION superglobal array
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        // Prepare a SQL statement to select user data from the database
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = oci_parse($conn, $sql);
        oci_bind_by_name($stmt, ":email", $email);
        oci_execute($stmt);

        // Fetch the user data as an associative array
        $user = oci_fetch_assoc($stmt);

        // Check if the result contains any rows
        if ($user) {
            // Verify the password using password_verify() function
            if (password_verify($password, $user['PASSWORD'])) {
                // Password is correct, start a session and store user data in $_SESSION superglobal array
                // session_start();
                $_SESSION['name'] = $user['NAME'];
                $_SESSION['email'] = $user['EMAIL'];
                $_SESSION['username'] = $user['USERNAME'];
                $_SESSION['role'] = $user['ROLE'];

                // echo $user['ROLE'];
                // Redirect to a welcome page

                if ($user) {
                    setDataCookie($user);
                }
                $_SESSION["authEvent"] = "";
                // setcookie("loggedUser", $email, time() + 86400, "/");
                $previous_url = $_SESSION["previousURL"];
                // echo $previous_url;
                header("Location: ./../index.php");
            } else {
                // Password is incorrect, display an error message
                header("Location: ./../View/Pages/login.php?error=Wrong password.");
                echo "Wrong password.";
            }
        } else {
            // No user found with that email, display an error message
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
    // Get user input from $_SESSION superglobal array
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $role = 'student';
    $form_data = $_SESSION;

    // Extraction of domain
    $emailParts = explode('@', $email);
    $mailDomain = end($emailParts);

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
        if ($mailDomain === 'teacher.eduspace.edu') {
            $role = 'teacher';
        } else {
            $role = 'student';
        }
        // Prepare a SQL statement to insert user data into the database 
        $sql = "INSERT INTO users (name, email, username, password, role) VALUES (:name, :email, :username, :hashed_password, :role)";
        $stmt = oci_parse($conn, $sql);
        oci_bind_by_name($stmt, ":name", $name);
        oci_bind_by_name($stmt, ":email", $email);
        oci_bind_by_name($stmt, ":username", $username);
        oci_bind_by_name($stmt, ":hashed_password", $hashed_password);
        oci_bind_by_name($stmt, ":role", $role);
        oci_execute($stmt);

        // Check if the insert was successful
        $rowsAffected = oci_num_rows($stmt);
        if ($rowsAffected > 0) {
            // User data inserted successfully, display a success message 

            $_SESSION["authEvent"] = "";
            // echo "User registered successfully.";

            $sqlLogin = "SELECT * FROM users WHERE email = :email";
            $stmtLogin = oci_parse($conn, $sqlLogin);
            oci_bind_by_name($stmtLogin, ":email", $email);
            oci_execute($stmtLogin);

            // Fetch the user data as an associative array
            $user = oci_fetch_assoc($stmtLogin);
            if ($user) {
                setDataCookie($user);
                $_SESSION['role'] = $user['ROLE'];
            }

            header("Location: ./../View/Pages/profile.php");
        } else {
            // User data insertion failed, display an error message 
            echo "Error inserting user data.";
        }
    }

}

?>