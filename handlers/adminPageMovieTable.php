<?php
    $movie_list = $conn->query($sql = "SELECT * FROM movies");
    if ($movie_list->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Genre</th><th>Category ID</th></tr>";
            while ($row = $movie_list->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["mid"] . "</td>";
            echo "<td>" . $row["movie_name"] . "</td>";
            echo "<td>" . $row["movie_genre"] . "</td>";
            echo "<td>" . $row["category_id"] . "</td>";
            echo "</tr>";
        }   
        echo "</table>";
    } else {
        echo "<div class='nothing-found'>No movies found.</div>";
    }   
?>