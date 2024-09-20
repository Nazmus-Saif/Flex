<?php 
    // Query to retrieve the profile image path for the logged-in user
    $user_id = $_SESSION['uid'];
    $result_profile = $conn->query("SELECT profile_image FROM users WHERE uid = $user_id");
    $profile_image = $result_profile->fetch_assoc()['profile_image'];
    // Query to retrieve the user name path for the logged-in user
    $result_user = $conn->query("SELECT name FROM users WHERE uid = $user_id");
    $user_data = $result_user->fetch_assoc();
?>