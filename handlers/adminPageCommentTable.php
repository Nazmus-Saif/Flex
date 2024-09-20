<?php
    // Query to retrieve all comments
    $comments_query = "SELECT * FROM comments";
    $comments_result = $conn->query($comments_query);
    if ($comments_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>User ID</th><th>Movie ID</th><th>Comment</th><th>Comment Date</th></tr>";
        while ($comment_row = $comments_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $comment_row["id"] . "</td>";
            echo "<td>" . $comment_row["uid"] . "</td>";
            echo "<td>" . $comment_row["mid"] . "</td>";
            echo "<td>" . $comment_row["comment_text"] . "</td>";
            echo "<td>" . $comment_row["comment_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='nothing-found'>No comments found.</div>";
    }
?>
