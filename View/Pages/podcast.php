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
    <title>EduSpace | Podcast</title>
    <link rel="stylesheet" href="./../../View/styles.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/9a6693ad48.js" crossorigin="anonymous"></script>

    <style>
        .card_wrapper {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin-block: 20px;
            margin-top: 90px;
            width: 100%;
            justify-items: center;
        }

        .card_container {
            margin: 10px;
            box-shadow: 1px 1px 5px var(--secondaryText2);
            width: 270px;
            padding: 20px;
            border-radius: 7px;
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
                    <img src="https://img.freepik.com/free-vector/hand-drawn-boat-party-vertical-banner_23-2149446480.jpg?t=st=1678662461~exp=1678663061~hmac=e6215eb6cfdf7c9722c3f420fda2fe188d50ae5e315b01693106ab171ba2ac5f" alt="book">
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
                    <img src="https://img.freepik.com/free-psd/live-streaming-influencer-social-media_1419-2416.jpg?w=740&t=st=1678662551~exp=1678663151~hmac=a7cb2c7482a6e08e77ffdb0e618ae8f856b2796e5234e9afe17d97b0a6ac51e1" alt="book">
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
                    <img src="https://img.freepik.com/free-vector/detailed-podcast-logo-midnight-talk_23-2148788223.jpg?w=740&t=st=1678662617~exp=1678663217~hmac=474811d58564c1ed7d6367e555e9e1c97deb59261c6ca72fc388d65ceb95755e" alt="book">
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
                    <img src="https://img.freepik.com/free-vector/detailed-podcast-logo-template_23-2148807789.jpg?w=740&t=st=1678662637~exp=1678663237~hmac=0e5c6fa3f62a8c237fb44a897919a4f40a35fba0de4055ebfa934ad5dabc285c" alt="book">
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
                    <img src="https://img.freepik.com/free-vector/hand-drawn-flat-podcast-cover-template_23-2149429805.jpg?w=740&t=st=1678662682~exp=1678663282~hmac=088876b1de3bfa0ebffc3317c874bfb33a1839f9676dcf4eb6b7f3953038613c" alt="book">
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
                    <img src="https://img.freepik.com/free-vector/hand-drawn-flat-podcast-cover-template_23-2149429807.jpg?w=740&t=st=1678662703~exp=1678663303~hmac=19f6ec1d966b74e92be47bf7e664a060481c0126ef0f99563c4aeec5eea3eb31" alt="book">
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
                    <img src="https://img.freepik.com/free-vector/hand-drawn-flat-podcast-cover-template_23-2149429807.jpg?w=740&t=st=1678662703~exp=1678663303~hmac=19f6ec1d966b74e92be47bf7e664a060481c0126ef0f99563c4aeec5eea3eb31" alt="book">
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
                    <img src="https://img.freepik.com/premium-vector/hand-drawn-flat-band-poster-template_23-2149429799.jpg?w=740" alt="book">
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