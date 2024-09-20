<?php
    $movie_list = $conn->query($sql = "SELECT uid, name, email FROM users");
    if ($movie_list->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>";
            while ($row = $movie_list->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["uid"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            if ($row["uid"] >= 1 && $row["uid"] <= 3) {
                echo "<td>Administrator</td>";
            } else {
                echo "<td>User</td>";
            }
            echo "</tr>";
        }   
        echo "</table>";
    } else {
        echo "<div class='nothing-found'>No users found.</div>";
    }   
?>