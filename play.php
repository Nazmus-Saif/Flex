<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // build database connection
    include './db.php';
    // get movie by conrresponding movie click in homepage by using movie id
    include './handlers/getMovieByID.php';
    // get the user id and profile picture
    include './handlers/getUserName&Profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($movie['movie_name']) ? $movie['movie_name'] : 'Not found'; ?> | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png"/>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/play_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="homepage-wrapper">
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php include './global/header1.php'; ?>
    <!-- Video Player Starts -->
    <div class="player-container">
        <?php
            $movie_file_path = $movie['movie_file_path'];
            echo "<video controls autoplay fullscreen>
                    <source src=\"$movie_file_path\" type='video/mp4'>
                </video>";
        ?>
    </div>
    <!-- Video Player Ends -->
    <!-- shot the title of the movie -->
    <div class="movie-title">
    <?php echo isset($movie['movie_name']) ? $movie['movie_name'] : 'Not found'; ?>
    </div>
    <div class="discussion">
        <div class="comment-box">
            <div class="profile">
                <div class="picture">
                    <?php
                        if (!empty($profile_image)) {
                            echo '<img src="' . $profile_image . '" alt="Profile Image">';
                        } else {
                            echo '<div class="no-image-text">None</div>';
                        }
                    ?>
                </div>
            </div>
            <!-- saving comment in database -->
            <?php 
                include './handlers/commentSubmit.php';
            ?>
            <div class="comment-input">
                <form role="comment-form" method="post" class="comment-form" action="" autocomplete="off">
                    <input type="text" placeholder="Add a comment.." name="comment" id="comment" autocomplete="off" required>
                    <button type="submit" name="submit" class="commentbtn">Comment</button>
                </form>
            </div>
        </div>
        <div class="comments-show">
            <?php 
            include './handlers/getCommentByMid.php';
            ?>
        </div>
    </div>
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
</div>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script3.js"></script>
</body>
</html>