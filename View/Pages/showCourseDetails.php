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
        .show_course_container {}

        .background_color {
            background-color: var(--darkText);
            position: absolute;
            top: 0;
            width: 100vw;
            height: 50vh;
            z-index: -1;
        }

        .show_course_details_container {
            padding-inline: 14%;
            margin-top: 100px;
            display: grid;
            grid-template-columns: auto 18vw;
            gap: 20px;
        }

        .show_course_details {
            color: white;
        }

        .show_course_cart {
            position: relative;
        }

        .course_cart {
            width: clamp(16vw, 18vw, 20vw);
            background-color: white;
            box-shadow: 0 0 4px #777;
            border-radius: 5px;
            padding: 1.5%;
            position: fixed;
            top: 110px;
        }

        .course_price {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 15px;
        }

        .course_price b {
            font-size: clamp(26px, 28px, 30px);
        }

        .course_cart .add_to_cart_btn,
        .buy_course_btn {
            width: 100%;
            padding: 10px 0;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            background-color: var(--tertiary);
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            color: var(--primary);
            transition: background-color 200ms;
        }

        .buy_course_btn {
            border: 1px solid var(--text);
            color: var(--text);
            background-color: transparent;
        }

        .add_to_cart_btn:hover {
            background-color: var(--text);
        }

        .info_message {
            text-align: center;
            width: 100%;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .course_details_list {
            margin-bottom: 20px;
        }

        .coupon_input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            outline: none;
        }

        .coupon_input_filed {
            border-bottom: 2px solid var(--secondaryText2);
        }
        .coupon_input_filed:focus {
            border-bottom: 2px solid var(--text);
        }

        .coupon_btn {
            border: 2px solid var(--text);
            cursor: pointer;
            transition: all 200ms;
            font-size: 16px;
            font-weight: 600;
            color: var(--text);
        }

        .coupon_btn:hover {
            background-color: var(--text);
            color: var(--primary);
        }
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="show_course_container">
        <div class="background_color"></div>
        <div class="show_course_details_container">
            <div class="show_course_details">
                <h1>The Complete 2023 Web Development Bootcamp</h1>
                <p>Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, MongoDB,
                    Web3 and DApps</p>
                <div>
                    <p>Bestseller</p>
                    <p>Rating: 4.7 out of 5</p>
                    <p>(269,657 ratings)</p>
                    <small>914,966 students</small>
                </div>

                <p>Created by </p>
            </div>

            <div class="show_course_cart">
                <div class="course_cart">
                    <div class="course_price">
                        <b>$16.99</b>
                        <p>$99.99 83% off</p>
                    </div>

                    <button class="add_to_cart_btn" type="button">Add to cart</button>
                    <button class="buy_course_btn" type="button">Buy now</button>

                    <p class="info_message">30-Day Money-Back Guarantee</p>

                    <div class="course_details_list">
                        <b>This course includes:</b>

                        <p>65 hours on-demand video</p>
                        <p>86 articles</p>
                        <p>49 downloadable resources</p>
                        <p>8 coding exercises</p>
                        <p>Full lifetime access</p>
                        <p>Access on mobile and TV</p>
                        <p>Certificate of completion</p>
                    </div>

                    <input class="coupon_input coupon_input_filed" type="text" name="coupone" placeholder="Your Coupon">
                    <input class="coupon_input coupon_btn" type="button" value="Add Coupon">
                </div>
            </div>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>