<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // get database connection
    include './db.php';
    // get the user id and profile picture
    include './handlers/getUserName&Profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mystery | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/geners_categories_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php include './global/header2.php'; ?>
    <!-- Body Starts -->
    <div class="body">
        <h2>Mystery Movies</h2>
        <?php
            $desiredGenre = "mystery"; // Change this to the genre you want to display
            include './handlers/getMovieByGenre.php';
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