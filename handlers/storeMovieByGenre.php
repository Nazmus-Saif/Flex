<?php
    $genres = ["action", "comedy", "horror", "sci-fi", "fantasy", "romance", "adventure","war", "mystery", "crime", "thriller", "documentary"];
        $movies = []; /* it holds -> $movies = [
        'action' => [Array of action movies ],
        'comedy' => [Array of comedy movies],
        'horror' => [Array of horror movies],
        'sci-fi' => [Array of sci-fi movies]
        ];*/

        foreach($genres as $genre) {
        $movies[$genre] = [];
        
        $sql = "SELECT * FROM movies WHERE movie_genre='$genre'";
        $db_results = $conn->query($sql);

        if(mysqli_num_rows($db_results) > 0) {
            while($row = $db_results -> fetch_assoc()) {
                array_push($movies[$genre], $row);
            }
            // this lines removes duplicate entries in movies  
            $movies = array_unique($movies, SORT_REGULAR);
        }
        }
?>