<?php
session_start();
include '../db.php';

// Update in DB
$uid = $_SESSION['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

// Check if password and confirmpassword match
if ($password !== $confirmPassword) {
    echo "<script type='text/javascript'>alert('Password and Confirm Password do not match! Please try again.'); window.location.href='../admin.php'</script>";
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
            echo "<script type='text/javascript'>alert('Name and email already exist! Please use a different name and email.'); window.location.href='../admin.php'</script>";
        } elseif (strtolower($existingUser['name']) == $name) {
            echo "<script type='text/javascript'>alert('Name already exists! Please use a different name.'); window.location.href='../admin.php'</script>";
        } elseif (strtolower($existingUser['email']) == $email) {
            echo "<script type='text/javascript'>alert('Email already exists! Please use a different email.'); window.location.href='../admin.php'</script>";
        }
    } else {
        // Use bind parameter for the password
        $sql = "UPDATE users SET name=?, email=?, password=? WHERE uid=?";
        $stmtUpdate = $conn->prepare($sql);

        // Hash the password using md5
        $passwordHash = md5($password);

        // Bind parameters
        $stmtUpdate->bind_param("sssi", $name, $email, $passwordHash, $uid);

        // Execute the query
        $result = $stmtUpdate->execute();

        if (!$result) {
            echo "<script type='text/javascript'>alert('Updation of User Details Unsuccessful! Please Try Again.\n {$conn->error}'); window.location.href='../admin.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Updation of User Details Successful!'); window.location.href='../admin.php'</script>";
        }

        // Close the update statement
        $stmtUpdate->close();
    }

    // Close the check statement
    $stmtCheck->close();
}
?>
