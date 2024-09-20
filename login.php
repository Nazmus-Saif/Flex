<?php
// Only Allow Logged In Users
session_start();
if (isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true) {
    header("Location: ./homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="full-body">
        <!-- Header Start -->
        <header class="head">
            <div class="logo"><h1><a href="./homepage.php" class="brand">FLEX</a></h1></div>
            <div class="signup"><a class="button" href="./register.php"><button>Sign up</button></a></div>
        </header>
        <!-- Header End -->
        <!-- Display the error message if it's present in the session -->
        <div class="error-message">
            <?php
            if (isset($_SESSION['login_error'])) {
                echo '<p>' . $_SESSION['login_error'] . '</p>';
                unset($_SESSION['login_error']); // Clear the error message from the session
            }
            ?>
        </div>
        <!-- Login Box Starts -->
        <div class="login-container">
            <div class="login-box">
                <form action="./handlers/loginHandler.php" method="POST" class="login-box-form">
                    <h2>Sign in</h2>
                    <div>
                        <input type="email" name="email" id="email" placeholder="Email" value="" required />
                    </div>
                    <div>
                        <input type="password" name="password" id="password" autoComplete="true" placeholder="Password" value="" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="login_form">Continue</button>
                    <div class="signup-box">
                        <p>Are you new to Flex?</p>
                        <a href="./register.php"><button type="button">Create Your Account</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Login Box Ends -->
    </div>
    <!-- Footer Start -->
    <footer>
        <div class="footer">
            <span>Any questions? <a href="" target="_blank">Contact us</a></span>
            <h5><a href="" target="_blank">Terms of Use</a>
                &copy; Developed by <a href="./aboutUs.php" target="_blank">Agent One</a> </h5>
        </div>
    </footer>
    <!-- Footer End -->
</body>
</html>
