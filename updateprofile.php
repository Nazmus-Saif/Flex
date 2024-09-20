<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true)) {
        header("Location: ./login.php");
    }
    // include the database
    include './db.php';
    // get user id and profile picture
    include './handlers/getUserName&Profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Profile | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/updateprofile_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header2 file -->
    <?php 
        include './global/header1.php';
        // get user all info
        include './handlers/getUserInfoAll.php';
    ?>
     <!-- Account Update Starts -->
     <div class="account-container">
        <div class="account-box">
            <form action="./handlers/userAccountHandler.php" method="POST" class="account-box-form" enctype="multipart/form-data">
                <h3 class="account-box-title">Update Details</h3>

                <div>
                    <label htmlFor="profile_image">Enter new name [if you want to change]</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name"
                        value="<?php echo ucwords($user['name']) ?>" required />
                </div>
                <div>
                    <label htmlFor="profile_image">Enter new email [if you want to change]</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address"
                        value="<?php echo $user['email'] ?>" required />
                </div>
                <div>
                    <label htmlFor="profile_image">Enter new password [if you want to change]</label>
                    <input type="password" name="password" id="password" autoComplete="true"
                        placeholder="Enter new password" value="<?php echo $user['password'] ?>" required />
                </div>
                <div>
                    <label htmlFor="profile_image">Confirm new password [if you want to change]</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true"
                        placeholder="Confirm new password" value="<?php echo $user['password'] ?>" required />
                </div>
                <div>
                    <label htmlFor="profile_image">Profile Image [Upload Image Size < 1MB]</label>
                    <input type="file" name="profile_image" id="profile_image" accept="image/jpg, image/jpeg, image/png" required/>
                </div>
                <button type="submit" class="btn btn-primary" name="account_form" value="Update">Update</button>
            </form>
        </div>
    </div>
    <!-- Account Update Ends -->
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
    <!-- JS Scripts -->
    <script src="./scripts/script1.js"></script>
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script3.js"></script>
</body>
</html>