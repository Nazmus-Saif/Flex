<?php
    if(isset($_GET['mid'])) {
        $mid = $_GET['mid'];
        $sql = "SELECT * from movies WHERE mid = '$mid'";
        $result = $conn->query($sql);
        if(!$movie = $result->fetch_assoc()) {
            echo "No movie found with mid $mid";
        }
    }
?>