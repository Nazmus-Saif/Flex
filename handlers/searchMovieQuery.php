<?php 
    // Search
    $resultFound = false;
    if (isset($_GET['q']) && isset($_GET['o'])) {
        $resultFound = false;
        $query = $_GET['q'];
        $option = $_GET['o'];
        $query_array = explode(" ", $query);
        $results = [];
        if ($query != "") {
            foreach ($query_array as $sub_query) {
                // Check the selected search option
                if ($option === 'Action') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'action' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Horror') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'horror' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Comedy') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'comedy' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Sci-fi') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'sci-fi' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Fantasy') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'fantasy' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Romance') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'romance' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Adventure') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'adventure' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Crime') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'crime' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Thriller') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'thriller' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'War') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'war' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Mystery') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'mystery' AND Movie_Name LIKE '%$sub_query%'";
                }elseif ($option === 'Documentary') {
                    $sql = "SELECT * FROM movies WHERE Movie_Genre = 'documentary' AND Movie_Name LIKE '%$sub_query%'";
                }else {
                    $sql = "SELECT * FROM movies WHERE $option LIKE '%$sub_query%'";
                }
                $db_results = $conn->query($sql);
                if (mysqli_num_rows($db_results) <= 0) {
                    $resultFound = false;
                } else {
                    while ($row = $db_results->fetch_assoc()) {
                        array_push($results, $row);
                    }
                    $results = array_unique($results, SORT_REGULAR);
                    $resultFound = true;
                }
            }
        }
    }  
?>    
