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
            text-align: center;
            padding: 20px;
        }

        .recommended_course_selection {
            padding: 10px 20px;
            background-color: var(--primary);
            border: none;
            border-bottom: 2px solid var(--secondaryText2);
            border-radius: 4px;
            margin-block: 30px;
            width: 30vw;
            outline: none;
        }

        .recommended_course_button {
            padding: 10px 30px;
            font-size: clamp(11px, 15px, 18px);
            font-weight: 600;
            background-color: var(--primary);
            border: 2px solid var(--text);
            color: var(--text);
            border-radius: 10px;
            cursor: pointer;
            transition: 200ms;
            width: clamp(20vw, 20vw, 20vw);
        }

        .recommended_course_button:hover {
            padding: 10px 30px;
            font-size: clamp(11px, 15px, 18px);
            font-weight: 600;
            background-color: var(--text);
            border: 2px solid var(--secondaryText2);
            color: var(--primary);
            border-radius: 10px;
            cursor: pointer;
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
            /* margin: 5px 0; */
        }
    </style>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>

        <div class="dashboard_content_section">
            <?php
            $success_message = '';
            $error_message = '';
            // Connect to the database
            
            // Check if the form has been submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    if (isset($_POST['email'])) {
                        $email = $_POST['email'];

                        // Prepare the statement to call the stored procedure
                        $query = "BEGIN UPDATE_USER_ROLE(:email); END;";
                        $stmt = oci_parse($conn, $query);

                        // Bind the input parameter
                        oci_bind_by_name($stmt, ":email", $email);

                        // Execute the statement
                        oci_execute($stmt);

                        // Check if the update was successful
                        if (oci_num_rows($stmt) > 0) {
                            $success_message = 'User role updated to admin';
                        } else {
                            $error_message = 'Failed to add admin.';
                        }
                    }
                } catch (Exception $e) {
                    if ($e->getCode() == 1) { // check for duplicate key error code
                        echo "Course already exists as recommended course";
                    } else {
                        echo "An error occurred: " . $e->getMessage();
                    }
                }
            }

            ?>

            <div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <h1 style="color: var(--text)" for="email">Select an Email:</h1>

                    <br />
                    <select class="recommended_course_selection" name="email" id="email">
                        <?php
                        $query = "SELECT email, name FROM users";
                        $stmt = oci_parse($conn, $query);
                        oci_execute($stmt);

                        // Loop through the results and create an option for each user
                        while ($row = oci_fetch_assoc($stmt)) {
                            ?>
                            <option value="<?php echo $row['EMAIL']; ?>">
                                <?php echo $row['NAME']; ?>: email: <?php echo $row['EMAIL']; ?>
                            </option>
                            <?php
                        }

                        // Close the database connection
                        oci_close($conn);
                        ?>
                    </select>
                    <br />
                    <?php if (!empty($success_message)): ?>
                        <div class="success_message success">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error_message)): ?>
                        <div class="error_message error">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <br>
                    <button class="recommended_course_button" type="submit">Add Admin</button>
                </form>
                <br><br>
                <div>
                    <h2>Admin Users</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        <?php
                        $query = "SELECT name, email, role FROM users WHERE role = 'admin'";
                        $stmt = oci_parse($conn, $query);
                        oci_execute($stmt);

                        // Loop through the results and create a table row for each admin user
                        while ($row = oci_fetch_assoc($stmt)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['NAME']; ?>
                                </td>
                                <td>
                                    <?php echo $row['EMAIL']; ?>
                                </td>
                                <td>
                                    <?php echo $row['ROLE']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>

</body>


</html>