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
    <title>Sign up</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/register_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="full-body">
        <!-- Header Start -->
        <header class="head">
            <div class="logo">
                <h1><a href="./homepage.php" class="brand">FLEX</a></h1>
            </div>
            <div class="signin"><a class="button" href="./login.php"><button>Sign in</button></a></div>
        </header>
        <!-- Header End -->
        <div class="alert-message">
            <!-- Display registration success message if it's present in the session -->
            <?php
            if (isset($_SESSION['register_success'])) {
                echo '<p>' . $_SESSION['register_success'] . '</p>';
                unset($_SESSION['register_success']); // Clear the success message from the session
            }
            ?>
            <!-- Display registration error message if it's present in the session -->
            <?php
            if (isset($_SESSION['register_error'])) {
                echo '<p>' . $_SESSION['register_error'] . '</p>';
                unset($_SESSION['register_error']); // Clear the error message from the session
            }
            ?>
        </div>

        <!-- Signup Box Starts -->
        <div class="signup-container">
            <div class="signup-box">
                <form action="./handlers/registerHandler.php" method="POST" class="register-box-form" enctype="multipart/form-data">
                    <h3>Create Account</h3>
                    <div>
                        <input type="text" name="name" id="name" placeholder="Enter name" value="" required />
                    </div>
                    <div>
                        <input type="email" name="email" id="email" placeholder="Email address" value="" required />
                    </div>
                    <div>
                        <input type="password" name="password" id="password" autoComplete="true" placeholder="Enter password" value="" required />
                    </div>
                    <div>
                        <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true" placeholder="Confirm password" value="" required />
                    </div>
                    <div>
                        <label htmlFor="profile_image">Profile Image [Upload Image Size < 1MB]</label>
                        <input type="file" name="profile_image" id="profile_image" accept="image/jpg, image/jpeg, image/png" required/>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register_form">Continue</button>
                    <div class="signin-box">
                        <p>Already have an account?</p>
                        <a href="./login.php"><button type="button">Sign in</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Signup Box Ends -->
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