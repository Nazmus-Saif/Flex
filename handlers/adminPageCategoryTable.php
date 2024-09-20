<?php
    $sql = "SELECT * FROM categories";
    $category_list = $conn->query($sql);
    if ($category_list->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Category ID</th><th>Category Name</th></tr>";
        while ($row = $category_list->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["category_id"] . "</td>";
            echo "<td>" . $row["category_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='nothing-found'>No categories found.</div>";
    } 
?>