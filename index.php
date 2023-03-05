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

<script>
    function toggleMenu() {
        // Get the menu element by id
        const menu = document.getElementById("menu");
        // If the menu has the responsive class, remove it
        if (menu.className === "responsive") {
            menu.className = "";
            // Otherwise, add it
        } else {
            menu.className = "responsive";
        }

        const iconClass = document.querySelector(".icon");
        iconClass.innerHTML = `
            <i onclick="" class="fa fa-times"></i>
        `;
        iconClass.addEventListener("click", function () {
            if (iconClass.innerHTML == `<i class="fa fa-bars"></i>`) {
                iconClass.innerHTML = `<i class="fa fa-times"></i>`;
            } else {
                iconClass.innerHTML = `<i class="fa fa-bars"></i>`;
            }
        })

    }
</script>

<body>
    <?php include "View/Shared/Navbar.php" ?>
    <?php include "View/Home/Heading.php" ?>
    <?php include "View/Home/OurServices.php" ?>
    <?php include "View/Home/TopCategories.php" ?>
    <?php include "View/Shared/Footer.php" ?>
</body>


</html>