<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-Menu</title>
    <style>
        *{
            font-size: 25px;
            padding: 2px;
        }
        th,tr,td{
            padding: 5px;
        }
        td{
            border-bottom: 1px solid black;
        }
        tr:nth-child(even){
            background-color: #f4f4; 
        }
    </style>
</head>
<body>
    <table width=80%;>
        <th>Item Name</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
        <?php
            $sql = "select * from food_details";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>". $row['food_items'] ."</td>";
                echo "<td>". $row['price_per_item'] ."</td>";
                echo "<td><a href=\"edit_food.php?food_items=$row[food_items]\"</a>Edit</td>";
                echo "<td><a href=\"delete_food.php?food_items=$row[food_items]\" onClick=\"return confirm('Are You Sure ?')\"</a>Delete</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br><br><br>
    <a href="admin.php">Dashboard</a>
</body>
</html>