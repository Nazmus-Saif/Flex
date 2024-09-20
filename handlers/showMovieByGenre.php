<?php
    function displayGenreMovies($genre, $movies) {
        $content = $movies[$genre];
        if (!empty($content)) {
            $movie_genre = ucwords($genre);
            echo "<div class=\"movies\">";
            foreach ($content as $movie) {
                $mid = $movie['mid'];
                $movie_cover_path = $movie['movie_cover_path'];
                $movie_name = ucwords($movie['movie_name']);
                echo "<a href=\"./play.php?mid=$mid\">
                        <img src=\"$movie_cover_path\" alt=\"$movie_name\" class=\"result-image\">
                    </a>";
            }
            echo "</div>";
        } else {
            echo "<div class=\"no-movies\">";
                echo "No movies found for the $genre genre.";
            echo "</div>";
        }
    }
?>