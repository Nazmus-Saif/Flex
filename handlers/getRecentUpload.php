<!-- this php file is created for matching the recent upload page with genres and categories page -->
<?php
    $recentMovies = "SELECT mid, movie_cover_path, movie_name FROM movies ORDER BY mid DESC";
    $resultMovies = $conn->query($recentMovies);
    if (!empty($resultMovies)) {
        echo "<div class=\"results\">";
        while ($movie = mysqli_fetch_assoc($resultMovies)) {
            $mid = $movie['mid'];
            $movie_cover_path = $movie['movie_cover_path'];
            $movie_name = ucwords($movie['movie_name']);
            echo "<a href=\"./play.php?mid=$mid\">
                <img src=\"$movie_cover_path\" alt=\"$movie_name\" class=\"result-image\">
            </a>";
        }
        echo "</div>";
    } else {
        echo "No movies found for the $desiredGenre genre.";
    }
?>