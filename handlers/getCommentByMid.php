<?php
    $movieID = $movie['mid'];

    // Construct an SQL query to select comments along with the user's profile image, name, and comment date
    $sql = "SELECT comments.comment_text, users.profile_image, users.name, comments.comment_date FROM comments 
            INNER JOIN users ON comments.uid = users.uid WHERE comments.mid = $movieID ORDER BY id DESC"; // show comment in desc order

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $commentText = htmlspecialchars($row['comment_text']);
            $profileImage = $row['profile_image'];
            $userName = $row['name'];
            $commentDate = $row['comment_date'];

            // display the user profile image, user name, and comment
            echo '<div class="comment-container">';
            if (!empty($profileImage)) {
                echo '<div class="user-profile-image">';
                echo '<img src="' . $profileImage . '" alt="User Profile Image">';
                echo '</div>';
            }
            echo '<div class="comment-content">';
            if (!empty($userName) && !empty($commentDate)) {
                echo '<div class="user-details">';
                echo '<div class="user-name">@' . $userName . '</div>';
                echo '<div class="comment-date">' . $commentDate . '</div>';
                echo '</div>';
            }
            echo '<div class="comment-text">' . $commentText . '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No comments available.';
    }
?>
