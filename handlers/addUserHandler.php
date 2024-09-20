<?php
session_start();
include '../db.php';

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

// Check if the password and confirm password match
if ($password !== $confirmPassword) {
    echo "<script type='text/javascript'>alert('Password and Confirm Password do not match! Please try again.'); window.location.href='../admin.php'</script>";
} else {
    // Check if the email or name already exists in the database
    $checkQuery = "SELECT * FROM users WHERE email=?";
    $stmtCheck = $conn->prepare($checkQuery);

    // Bind parameters
    $stmtCheck->bind_param("s", $email);

    // Execute the query
    $stmtCheck->execute();

    // Get the result
    $checkResult = $stmtCheck->get_result();

    if ($checkResult->num_rows > 0) {
        $existingUser = $checkResult->fetch_assoc();

        // Check if email match
        if (strtolower($existingUser['email']) == $email) {
            echo "<script type='text/javascript'>alert('Email already exists! Please use a different email.'); window.location.href='../admin.php'</script>";
        }
    } else {
        // Handle profile image upload
        $targetDirectory = "../media/profileimage/"; // Directory where you want to store uploaded images
        $targetFile = $targetDirectory . basename($_FILES["profile_image"]["name"]);

        // Define a maximum allowed image size in bytes (e.g., 1MB)
        $maxImageSize = 1 * 1024 * 1024; // 1MB in bytes

        // Check if the file has been successfully uploaded
        if ($_FILES["profile_image"]["size"] > $maxImageSize) {
            echo "<script type='text/javascript'>alert('Image size is too large. Maximum allowed size is 1MB.'); window.location.href='../admin.php'</script>";
        } elseif (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
            // Insert the new user into the database with the profile image path
            $insertQuery = "INSERT INTO users(name, email, password, profile_image) VALUES(?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($insertQuery);

            // Bind parameters
            $stmtInsert->bind_param("ssss", $name, $email, $password, $targetFile);

            // Execute the query
            $insertResult = $stmtInsert->execute();

            if (!$insertResult) {
                echo "<script type='text/javascript'>alert('Registration Unsuccessful! Please try again. {$conn->error}'); window.location.href='../admin.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Registration Successful! Press OK to Redirect to Login Page.'); window.location.href='../admin.php'</script>";
            }

            // Close the insert statement
            $stmtInsert->close();
        } else {
            echo "<script type='text/javascript'>alert('Failed to upload profile image. Please try again.'); window.location.href='../admin.php'</script>";
        }
        // {$conn->error} prints the specific database error which is helpful for debugging
    }

    // Close the check statement
    $stmtCheck->close();
}
?>
