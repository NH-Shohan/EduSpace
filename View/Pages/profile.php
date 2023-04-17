<?php
session_start();

require_once './../../Controller/db_connect.php';
$userData = null;
if (empty($_COOKIE['loggedUser'])) {
    echo "no logged in user found!";
} else {
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
    $encryptedData = $_COOKIE['loggedUser'];
    $decryptedData = decrypt($encryptedData, 'secret_key');
    $userData = json_decode($decryptedData, true);
}
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
        .profile_container {
            height: calc(100vh - 60px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile_section {
            display: grid;
            gap: 30px;
            grid-template-columns: 2fr 1fr;
            border: 2px solid var(--secondaryText2);
            width: 50%;
            height: 85%;
            padding: 20px;
            border-radius: 10px;
        }

        .profile_details form label {
            font-size: 11px;
        }

        .profile_details form input {
            outline: none;
            padding: 5px 10px;
            margin-bottom: 5px;
            border-bottom: 2px solid var(--secondaryText2);
        }

        .profile_details form input:hover,
        .profile_details form input:focus {
            border-bottom: 2px solid var(--text);
        }

        .profile_details form button {
            background-color: var(--tertiary);
            border: none;
            padding: 5px;
            margin-top: 30px;
            width: 49.4%;
            border-radius: 5px;
            border: 2px solid var(--text);
            cursor: pointer;
            transition: all 200ms;
        }

        .profile_details form button:hover {
            background-color: var(--text);
        }

        .profile_image img {
            width: 220px;
            background-color: var(--primary);
            border-radius: 50%;
            border: 2px solid var(--text);
        }
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="profile_container">
        <div class="profile_section">
            <div class="profile_details">
                <form>
                    <h1 style="color:var(--text)">Profile Information</h1>
                    <label for="name">Name</label>
                    <input value="<?php echo $userData['name'] ?>" type="text" name="name" />

                    <label for="username">User Name</label>
                    <input value="<?php echo $userData['username'] ?>" type="text" name="username" />

                    <label for="email">Email</label>
                    <input value="<?php echo $userData['email'] ?>" type="email" name="email" />

                    <label for="password">Current Password</label>
                    <input type="password" name="password" />

                    <label for="newPassword">New Password</label>
                    <input type="password" name="confirmPassword" />

                    <label for="confirmPassword">Confirm New Password</label>
                    <input type="password" name="confirmPassword" />

                    <button type="submit">SAVE</button>
                    <button type="reset">RESET</button>
                </form>
            </div>

            <div class="profile_image">
                <img src="https://th.bing.com/th/id/R.b1c131b8da9278bff3be80106c7d2058?rik=PicaGM7Cf6NyMA&pid=ImgRaw&r=0"
                    alt="Image">
            </div>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>