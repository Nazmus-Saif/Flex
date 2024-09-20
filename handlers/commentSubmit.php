<?php 
    if(isset($_POST['submit'])){
        $uid = $_SESSION['uid'];
        $comment = $_POST['comment'];
        $insertQuery = $conn->prepare("INSERT INTO comments (uid, mid, comment_text) VALUES (?,?,?)");
        $insertQuery->bind_param("iis",$uid, $mid, $comment);
        if ($insertQuery->execute()) {
            return true; // comment added successfully
        } else {
            return false; // error occurred
        }
    }
?>