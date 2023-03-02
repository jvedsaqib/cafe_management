<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-insert</title>
</head>
<body>
    <form action="insert_food.php" method="post">
        <label for="food-name">
            Enter food name:
            <input type="text" name="food_name">
        </label><br><br>
        <label for="food-price">
            Enter food price:
            <input type="number" name="food_price">
        </label><br><br>
        <button name="submit">Submit</button>
    </form>
    <a href="admin.php">Dashboard</a>
</body>
</html>

<?php
    include('connection.php');

    if(isset($_POST['submit'])){
        $sql = "insert into food_details values('"
                . $_POST['food_name'] ."',"
                . $_POST['food_price'] .");";

        mysqli_query($conn, $sql);
    }
?>