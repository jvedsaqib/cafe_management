<?php
    include('connection.php');
    $item = $_GET['food_items'];

    $sql = "DELETE FROM food_details where food_items = '$item'";
    mysqli_query($conn, $sql);
    header("location: display_food.php");

?>