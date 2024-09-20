<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // include the database
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
    <title>Profile | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/profile_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php include './global/header1.php'; ?>
    <?php 
        include './handlers/getUserInfoAll.php';
    ?>
    <!-- profile box starts -->
    <div class="profile-container">
        <!-- Display the profile image of user-->
        <div class="profile-image">
        <?php 
            $profileImage = $user['profile_image'];
            if (!empty($profileImage)) {
                echo '<img src="' . $profileImage . '" alt="Profile Image">';
            } else {
                echo 'No profile image available';
            }
        ?>
        </div>
        <div class="profile-details">
            <div class="detail1">Name : <p><?php echo $user['name']; ?></p></div>
            <div class="detail2">Email : <p><?php echo $user['email']; ?></p></div>
        </div>
    </div>
    <!-- profile box ends -->
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script3.js"></script>
</body>
</html>