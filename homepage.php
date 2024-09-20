<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // include the database
    include './db.php';
    // store all movies by genre in database
    include './handlers/storeMovieByGenre.php';
    // get the user id and profile picture
    include './handlers/getUserName&Profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/homepage_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="homepage-wrapper">
        <!-- the following php line will get the header content from the global/header1 file -->
        <?php include './global/header1.php'; ?>
        <!-- live chat box -->
        <div class="live-chat">
            <?php // only admin can delete chat history
                if (isset($_SESSION['uid'])) {
                    if ($_SESSION['uid'] == 1 || $_SESSION['uid'] == 2 || $_SESSION['uid'] == 3) {
                        echo '<i class="fa-solid fa-bars"></i>';
                    }
                }
            ?>
            <h3>Live Chat</h3>
            <div class="all-chat">
                <!-- write here if needed -->
            </div>
            <form action="" id="chat-form" method="post">
                <input type="text" class ="input-box" name="chat" id="chat" placeholder="Enter text here" value="" required/>
                <button class="send"> <i class="fa-regular fa-paper-plane"></i></button>
            </form>
        </div>
        <!-- Image Slider Start-->
        <!-- here id is used to get  -->
        <div class="slider-wrapper" id="slider-container">
                <h2>Upcoming Movies</h2>
            <div class="slider">
                <div class="slides">
                    <!-- takes input of each movement -->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <input type="radio" name="radio-btn" id="radio5">
                    <div class="slide first"> <!-- basically we shift the first image to see the next after it -->
                        <a href="https://youtu.be/vEjTUDjjU6A?si=SAN6BkOg5LjhKqaH" target="_blank">
                        <img src="./media/upcoming/1.jpg" height="100%" width="100%" object-fit="cover" alt="">
                        </a>
                    </div>
                    <div class="slide">
                        <img src="./media/upcoming/2.jpeg" height="100%" width="100%" object-fit="cover" alt="">   
                    </div>
                    <div class="slide">
                        <a href="https://youtu.be/bUR_FKt7Iso?si=lbsGvP_cZu7JMOcz" target="_blank">
                        <img src="./media/upcoming/3.jpg" height="100%" width="100%" object-fit="cover" alt="">
                        </a>
                    </div>
                    <div class="slide">
                        <a href="https://youtu.be/Dydmpfo68DA?si=SML3jE03lhehDAT0" target="_blank">
                        <img src="./media/upcoming/4.jpg" height="100%" width="100%" object-fit="cover" alt="">
                        </a>
                    </div>
                    <div class="slide">
                        <a href="https://youtu.be/FV3bqvOHRQo?si=a7UUpMXUwGEx2tr1" target="_blank">
                        <img src="./media/upcoming/5.jpg" height="100%" width="100%" object-fit="cover" alt="">
                        </a>
                    </div>
                    <!-- 5 circles -->
                    <div class="navigation-auto">
                        <!-- here btn1 means id is used to get click function menas when click a auto-btn it goes to the corresponding image -->
                        <div class="auto-btn1" id="btn1"></div>
                        <div class="auto-btn2" id="btn2"></div>
                        <div class="auto-btn3" id="btn3"></div>
                        <div class="auto-btn4" id="btn4"></div>
                        <div class="auto-btn5" id="btn5"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Image Slider End-->
        <!-- Movie list Start -->
        <div class="movie-list">
            <!-- top arrow button for automatic going to top by clicking this -->
            <button class="top-arrow"><i class="fa-solid fa-arrow-up"></i></button>
            <h3>Recent Uploads</h3>
            <span class="see-more"><a href="./recentUpload.php"><button>See more</button></a></span>
            <div class="genre-section recent">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <!-- php for getting recent movies -->
                    <?php include './handlers/getRecentUploadMovies.php'; ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <!-- the following include php file is used for rest of the genre div for show movie by genre -->
            <?php include './handlers/showMovieByGenre.php'; ?>
            <h3>Action Genre</h3>
            <span class="see-more"><a href="./action.php"><button>See more</button></a></span>
            <div class="genre-section action">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("action", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Comedy Genre</h3>
            <span class="see-more"><a href="./comedy.php"><button>See more</button></a></span>
            <div class="genre-section comedy">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("comedy", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Horror Genre</h3>
            <span class="see-more"><a href="./horror.php"><button>See more</button></a></span>
            <div class="genre-section horror">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("horror", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div> 
            <h3>Sci-Fi Genre</h3>
            <span class="see-more"><a href="./sci-fi.php"><button>See more</button></a></span>
            <div class="genre-section sci-fi">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("sci-fi", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Fantasy Genre</h3>
            <span class="see-more"><a href="./fantasy.php"><button>See more</button></a></span>
            <div class="genre-section fantasy">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("fantasy", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Romance Genre</h3>
            <span class="see-more"><a href="./romance.php"><button>See more</button></a></span>
            <div class="genre-section romance">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("romance", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Adventure Genre</h3>
            <span class="see-more"><a href="./adventure.php"><button>See more</button></a></span>
            <div class="genre-section adventure">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("adventure", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>War Genre</h3>
            <span class="see-more"><a href="./war.php"><button>See more</button></a></span>
            <div class="genre-section war">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("war", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Mystery Genre</h3>
            <span class="see-more"><a href="./mystery.php"><button>See more</button></a></span>
            <div class="genre-section mystery">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("mystery", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Crime Genre</h3>
            <span class="see-more"><a href="./crime.php"><button>See more</button></a></span>
            <div class="genre-section crime">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("crime", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Thriller Genre</h3>
            <span class="see-more"><a href="./thriller.php"><button>See more</button></a></span>
            <div class="genre-section thriller">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("thriller", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <h3>Documentary Genre</h3>
            <span class="see-more"><a href="./documentary.php"><button>See more</button></a></span>
            <div class="genre-section documentary">
                    <button class="scroll-button left-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <?php displayGenreMovies("documentary", $movies) ?>
                    <button class="scroll-button right-button"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
        <!-- Movie list End -->
        <!-- the following php line will get the footer content from the global/footer file -->
        <?php include './global/footer.php'; ?>
    </div>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script3.js"></script>
</body>
</html>