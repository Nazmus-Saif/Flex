<?php 
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM users WHERE uid = $uid";
    $result = $conn -> query($sql);
    $user = $result -> fetch_assoc();
?>