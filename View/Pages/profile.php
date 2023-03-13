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
                    <input type="text" name="name" />

                    <label for="username">User Name</label>
                    <input type="text" name="username" />

                    <label for="email">Email</label>
                    <input type="email" name="email" />

                    <label for="password">Current Password</label>
                    <input type="password" name="password" />

                    <label for="confirmPassword">New Password</label>
                    <input type="password" name="confirmPassword" />

                    <button type="submit">SAVE</button>
                    <button type="reset">RESET</button>
                </form>
            </div>

            <div class="profile_image">
                <img src="https://avatars.githubusercontent.com/u/83342210?s=400&u=023585129a2a6f4b8c59e2b231e665b56e63d0ac&v=4" alt="Image">
            </div>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>