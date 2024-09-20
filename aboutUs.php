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
    <title>Agent One | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/aboutus_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php include './global/header1.php'; ?>
    
    <div class="about">
        <div class="title">AGENT ONE</div>
        <div class="details">
            <ul>
                <img src="./media/profileimage/admin1.png" alt="saif">
                <p class="p">Nazmus Saif</p>
                <p>nazmussaif.cse@gmail.com</p>
                <p>CSE, Eastern University</p>
                <p>Khagan, Birulia, Savar, Bangladesh.</p>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-github"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-telegram"></i>
            </ul>
            <ul>
                <img src="./media/profileimage/admin2.jpg" alt="tanvir">
                <p class="p">Md. Kamruzzaman</p>
                <p>tanvir3430@gmail.com</p>
                <p>CSE, Eastern University</a>
                <p>Ashuganj, Brahmanbaria, Bangladesh.</p>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-github"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-telegram"></i>
            </ul>
            <ul>
                <img src="./media/profileimage/admin3.jpg" alt="evan">
                <p class="p">Estiaque Ahmed Evan</p>
                <p>evanahmed8@gmail.com</p>
                <p>CSE, Eastern University</p>
                <p>Jattrabari, Dhaka,Bangladesh.</p>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-github"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-telegram"></i>
            </ul>
        </div>
    </div>
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script4.js"></script>
</body>
</html>