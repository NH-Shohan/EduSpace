<?php
session_start();
require_once 'Controller/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="view/styles.css">
</head>

<script src="View/Shared/navbarScript.js"></script>

<body>
    <?php include "View/Shared/Navbar.php" ?>
    <?php include "View/Home/Heading.php" ?>
    <?php include "View/Home/OurServices.php" ?>
    <?php include "View/Home/TopCategories.php" ?>
    <?php include "View/Shared/Footer.php" ?>
</body>


</html>