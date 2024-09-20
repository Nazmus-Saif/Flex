<?php
    $sql = "SELECT * FROM movies WHERE movie_genre='$desiredGenre'";
    $db_results = $conn->query($sql);
    echo "<div class=\"results\">";
    if ($db_results->num_rows > 0) {
        $movie_genre = ucwords($desiredGenre);
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
        echo "No movies found for $desiredGenre genre.";
        echo "</div>";
    }
?>