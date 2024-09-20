<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // get database connection
    include './db.php';
    // search
    include './handlers/searchMovieQuery.php';
    // get the user id and profile picture
    include './handlers/getUserName&Profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/search_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php include './global/header2.php'; ?>
    <!-- Body Starts -->
    <div class="body">
        <div class="search-bar">
            <form action="" method="get" class="search">
                <input type="search" class="search-box" name="q" placeholder="Search Flex">
                <select name="o" class="search-option">
                    <option value="Movie_Name" selected>Name</option>
                    <option value="Movie_Genre">Genre</option>
                    <option value="Action">Action</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-fi">Sci-fi</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Romance">Romance</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Crime">Crime</option>
                    <option value="Thriller">Thriller</option>
                    <option value="War">War</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Documentary">Documentary</option>
                </select>
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- show search result -->
        <?php 
            include './handlers/searchMovieResult.php';
        ?>
    </div>
    <!-- Body Ends -->
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script4.js"></script>
</body>
</html>