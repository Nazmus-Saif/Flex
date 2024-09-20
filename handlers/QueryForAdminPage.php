<?php
    $user_id = $_SESSION['uid'];
    // Total Users Count Query
    $result_admins = $conn->query("SELECT COUNT(*) AS totalAdmins FROM users WHERE uid BETWEEN 1 AND 3");
    $totalAdmins = $result_admins->fetch_assoc()["totalAdmins"];
    // Total Users Count Query
    $result_users = $conn->query("SELECT COUNT(*) AS totalUsers FROM users WHERE uid > 3");
    $totalUsers = $result_users->fetch_assoc()["totalUsers"];
    // Total Movies Count Query
    $result_movies = $conn->query("SELECT COUNT(*) AS totalMovies FROM movies");
    $totalMovies = $result_movies->fetch_assoc()["totalMovies"];
    // Total Genres Count Query
    $result_genres = $conn->query("SELECT COUNT(DISTINCT movie_genre) AS totalGenres FROM movies");
    $totalGenres = $result_genres->fetch_assoc()["totalGenres"];
    // Total categories Count Query
    $result_categories = $conn->query("SELECT COUNT(DISTINCT category_name) AS totalCategories FROM categories");
    $totalCategories = $result_categories->fetch_assoc()["totalCategories"];
?>