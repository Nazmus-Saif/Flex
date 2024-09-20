<?php
    $sql = "SELECT * FROM movies WHERE category_id = $desiredCategoryId";
    $db_results = $conn->query($sql);
    $category_name = "SELECT category_name from categories WHERE category_id=$desiredCategoryId";
    $result_category = $conn->query($category_name);
    $category = $result_category->fetch_assoc()['category_name'];
    echo "<div class=\"results\">";
    if ($db_results->num_rows > 0) {
        while ($movie = $db_results->fetch_assoc()) {
            $mid = $movie['mid'];
            $movie_cover_path = $movie['movie_cover_path'];
            $movie_name = ucwords($movie['movie_name']);
            echo "<a href=\"./play.php?mid=$mid\">
                    <img src=\"$movie_cover_path\" alt=\"$movie_name\" class=\"result-image\">
                </a>";
        }
        echo "</div>";
    } else {
        echo "<div class=\"no-movies-found\">";
        echo "No movies found for the $category category.";
        echo "</div>";
    }
?>