<?php
session_start();
if (isset($_POST['admin_form'])) {
    include '../db.php';

    // File Targets
    $targetCover = "../media/covers/" . basename($_FILES['movie_cover']['name']);
    $targetMovie = "../media/movies/" . basename($_FILES['movie_file']['name']);

    // Store in DB
    $movie_name = strtolower($_POST['movie_name']);
    $movie_genre = strtolower($_POST['movie_genre']);
    $movie_category = $_POST['movie_category'];
    $movie_cover_path = "../media/covers/" . basename($_FILES['movie_cover']['name']);
    $movie_file_path = "../media/movies/" . basename($_FILES['movie_file']['name']);

    // Use bind parameters to prevent SQL injection
    $sql = "INSERT INTO movies(movie_name, movie_genre, category_id, movie_cover_path, movie_file_path) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssiss", $movie_name, $movie_genre, $movie_category, $movie_cover_path, $movie_file_path);

    // Execute the query
    $result = $stmt->execute();

    if ($result && move_uploaded_file($_FILES['movie_cover']['tmp_name'], $targetCover) && move_uploaded_file($_FILES['movie_file']['tmp_name'], $targetMovie)) {
        $_SESSION['admin_success'] = "Movie Added Successfully!";
    } else {
        $_SESSION['admin_error'] = "Error Uploading Movie! Please try again. Error details: {$conn->error}";
    }

    // Close the statement
    $stmt->close();

    // Redirect back to the admin page
    header("Location: ../admin.php");
}
?>
