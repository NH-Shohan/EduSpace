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
    <title>EduSpace | Audio Book</title>
    <link rel="stylesheet" href="./../../View/styles.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/9a6693ad48.js" crossorigin="anonymous"></script>

    <style>
        .card_wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-block: 20px;
            margin-top: 90px;
            width: 100%;
            justify-items: center;
        }

        .card_container {
            margin: 10px;
            box-shadow: 1px 1px 5px var(--secondaryText2);
            width: 390px;
            padding: 20px;
            border-radius: 7px;

            display: flex;
            gap: 20px;
        }

        .card_image img {
            width: 120px;
            border-radius: 5px;
        }

        .card_body{
            font-size: 15px;
        }
        .card_body i {
            color: #ffdd00;
        }
        .card_footer button{
            background-color: var(--tertiary);
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            padding: 3px 20px;
            color: var(--primary);
            cursor: pointer;
            transition: all 200ms;
        }
        .card_footer button:hover{
            background-color: var(--text);
        }
        .card_footer i{
            margin-right: 7px;
        }
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="container ">
        <div class="card_wrapper">
            <div class="card_container">
                <div class="card_image">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/yellow-business-leadership-book-cover-design-template-dce2f5568638ad4643ccb9e725e5d6ff.jpg?ts=1637017516" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_image">
                    <img src="https://i.pinimg.com/originals/a1/f8/87/a1f88733921c820db477d054fe96afbb.jpg" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_image">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/dreamy-sunflower-girl-yellow-book-cover-templ-design-template-7af3b28f2b5888bab43c923db87aebe0.jpg?ts=1637013622" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_image">
                    <img src="https://www.adobe.com/express/create/cover/media_17e0a26ced2fc5c9b180ee7efe56283ca9fb9eee9.jpeg?width=400&format=jpeg&optimize=medium" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_image">
                    <img src="https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/5dc264b62a4a2_template_image_1573020854.webp" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_image">
                    <img src="https://templates.mediamodifier.com/5dc84a826020b071eb02b66e/self-help-book-cover-template.jpg" alt="book">
                </div>

                <div class="card_body_details">
                    <div class="card_body">
                        <p><strong>Author:</strong> Nahim Hossain Shohan</p>
                        <p><strong>Published:</strong> 13.03.2022</p>
                        <p><strong>Rating:</strong>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            (4.6)
                        </p>
                    </div>

                    <div class="card_footer">
                        <button><i class="fa-solid fa-play"></i>Play</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./../../View/Shared/Footer.php" ?>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>