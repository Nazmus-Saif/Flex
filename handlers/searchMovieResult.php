<?php 
    if(isset($_GET['q']) && isset($_GET['o'])) {
            if($resultFound) {
            echo "<div class=\"results-heading\">
            <h2>Search Results for $option \"$query\"</h2></div>";
            echo "<div class=\"results\">";
            foreach ($results as $result) {
                $mid = $result['mid'];
                $movie_cover_path = $result['movie_cover_path'];
                $movie_name = ucwords($result['movie_name']);
                echo "<a href=\"./play.php?mid=$mid\">
                        <img src=\"$movie_cover_path\" alt=\"$movie_name\" class=\"result-image\">
                        </a>";
                }
                echo "</div>";
            }else{
                    echo "<div class=\"results-heading\">
                            <h2>No Results Found for $option \"$query\"</h2>
                        </div>";
                    }
            }
?>