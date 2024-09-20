<?php
session_start();
include '../db.php';

// Store in DB
$email = $_POST['email'];
$password = $_POST['password'];

// Use bind parameters to prevent SQL injection
$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $email, $password);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if (!$row = $result->fetch_assoc()) {
    // Set an error message in a session variable
    $_SESSION['login_error'] = "Incorrect Email or Password! Please Try Again.";
    // Redirect back to the login page
    header("Location: ../login.php");
} else {
    // Successful login, set session variables and redirect
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['loggedinflex'] = true;
    header("Location: ../homepage.php");
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
