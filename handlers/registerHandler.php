<?php
session_start();
include '../db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

if (isset($_POST['register_form'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Password length check
    if (strlen($password) < 8) {
        $_SESSION['register_error'] = "Password must be at least 8 characters long. Please try again.";
    } elseif ($password !== $confirmPassword) {
        $_SESSION['register_error'] = "Password and Confirm Password do not match! Please try again.";
    } else {
        // Existing user check
        $checkQuery = "SELECT * FROM users WHERE email=?";
        $stmtCheck = $conn->prepare($checkQuery);
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();
        $checkResult = $stmtCheck->get_result();

        if ($checkResult->num_rows > 0) {
            // Handle existing user
            $existingUser = $checkResult->fetch_assoc();

            if (strtolower($existingUser['email']) == $email) {
                $_SESSION['register_error'] = "Email already exists! Please use a different email.";
            }
        } else {
            // Image upload and registration
            $targetDirectory = "../media/profileimage/";
            $targetFile = $targetDirectory . basename($_FILES["profile_image"]["name"]);
            $maxImageSize = 1 * 1024 * 1024;

            if ($_FILES["profile_image"]["size"] > $maxImageSize) {
                $_SESSION['register_error'] = "Image size is too large. Maximum allowed size is 1MB.";
            } elseif (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {

                // Insert user into the database
                $insertQuery = "INSERT INTO users(name, email, password, profile_image) VALUES(?, ?, ?, ?)";
                $stmtInsert = $conn->prepare($insertQuery);
                $stmtInsert->bind_param("ssss", $name, $email, $password, $targetFile);
                $insertResult = $stmtInsert->execute();

                if ($insertResult) {
                    // Registration successful, now send a confirmation email
                    $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'kztanvirwebtest@gmail.com';
                        $mail->Password = 'xevnrabgyddlwupf';
                        $mail->setFrom('account@flex.com', 'FLEX');
                        $mail->SMTPSecure = 'tls'; // Enable TLS encryption;
                        $mail->Port = 587;
                        $mail->addAddress($email, $name);  // Mail will be sent to this address
                        $mail->isHTML(true);
                        $mail->Subject = 'Registration Confirmation';
                        $mail->Body = '<html>
                                            <head>
                                                <style>
                                                    body {
                                                        font-family: Arial;
                                                    }
                                                    .container {
                                                        text-align: center;
                                                    }
                                                    h2 {
                                                        color: #4285f4;
                                                    }
                                                </style>
                                            </head>
                                            <body>
                                                <div class="container">
                                                    <h2>Thank you for registering! Your account has been created successfully.</h2>
                                                </div>
                                            </body>
                                            </html>';

                        $mail->send();

                        $_SESSION['register_success'] = "Registration Successful! You can Sign in now and check your email for confirmation.";
                    } catch (Exception $e) {
                        $_SESSION['register_error'] = "Registration Successful, but failed to send confirmation email. Please contact support.";
                    }

                } else {
                    $_SESSION['register_error'] = "Registration Unsuccessful! Please try again.";
                }

                // Close the insert statement
                $stmtInsert->close();
            } else {
                $_SESSION['register_error'] = "Failed to upload profile image. Please try again.";
            }
        }

        // Close the check statement
        $stmtCheck->close();
    }

    // Redirect to the registration page
    header("Location: ../register.php");
} else {
    // Redirect to registration page if the form wasn't submitted
    header("Location: ../register.php");
}
?>
