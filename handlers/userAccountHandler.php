<?php
session_start();
include '../db.php';

// Get data from the form
$uid = $_SESSION['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

// Check if the password and confirm password match
if ($password !== $confirmPassword) {
    echo "<script type='text/javascript'>alert('Password and Confirm Password do not match! Please try again.'); window.location.href='../profile.php'</script>";
} else {
    // Check if the email or name already exists in the database
    $checkQuery = "SELECT * FROM users WHERE (name=? OR email=?) AND uid != ?";
    $stmtCheck = $conn->prepare($checkQuery);

    // Bind parameters
    $stmtCheck->bind_param("ssi", $name, $email, $uid);

    // Execute the query
    $stmtCheck->execute();

    // Get the result
    $checkResult = $stmtCheck->get_result();

    if ($checkResult->num_rows > 0) {
        $existingUser = $checkResult->fetch_assoc();

        // Check if both name and email match
        if (strtolower($existingUser['name']) == $name && strtolower($existingUser['email']) == $email) {
            echo "<script type='text/javascript'>alert('Name and email already exist! Please use a different name and email.'); window.location.href='../profile.php'</script>";
        } elseif (strtolower($existingUser['name']) == $name) {
            echo "<script type='text/javascript'>alert('Name already exists! Please use a different name.'); window.location.href='../profile.php'</script>";
        } elseif (strtolower($existingUser['email']) == $email) {
            echo "<script type='text/javascript'>alert('Email already exists! Please use a different email.'); window.location.href='../profile.php'</script>";
        }
    } else {
        // Handle profile image upload
        $targetDirectory = "../media/profileimage/"; // Directory where you want to store uploaded images
        $targetFile = $targetDirectory . basename($_FILES["profile_image"]["name"]);

        // Define a maximum allowed image size in bytes (e.g., 1MB)
        $maxImageSize = 1 * 1024 * 1024; // 2MB in bytes

        // Check if the file has been successfully uploaded
        if ($_FILES["profile_image"]["size"] > $maxImageSize) {
            echo "<script type='text/javascript'>alert('Image size is too large. Maximum allowed size is 1MB.'); window.location.href='../profile.php'</script>";
        } elseif (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
            $passwordHash = md5($password);
            // Insert the new user into the database with the profile image path
            $updateQuery = "UPDATE users SET name=?, email=?, password=?, profile_image=? WHERE uid=?";
            $stmtUpdate = $conn->prepare($updateQuery);

            // Bind parameters
            $stmtUpdate->bind_param("ssssi", $name, $email, $passwordHash, $targetFile, $uid);

            // Execute the query
            $updateResult = $stmtUpdate->execute();

            if (!$updateResult) {
                echo "<script type='text/javascript'>alert('Update Unsuccessful! Please try again. {$conn->error}'); window.location.href='../profile.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Update Successful! Press OK to Redirect Profile Page.'); window.location.href='../profile.php'</script>";
            }

            // Close the update statement
            $stmtUpdate->close();
        } else {
            echo "<script type='text/javascript'>alert('Failed to upload profile image. Please try again.'); window.location.href='../profile.php'</script>";
        }
        // {$conn->error} prints the specific database error which is helpful for debugging
    }

    // Close the check statement
    $stmtCheck->close();
}
?>
