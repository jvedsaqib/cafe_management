<?php
    include('connection.php');
    $item = $_GET['food_items'];
    $res = mysqli_query($conn, "select * from food_details where food_items = \"$item\"");

    $row=mysqli_fetch_array($res);
    $price = $row['price_per_item'];

    if(isset($_POST['update'])){

        $updated_item = $_POST['item'];
        $price = $_POST['price'];

        $sql = "UPDATE food_details SET food_items = '$updated_item',
                                    price_per_item = $price where food_items = '$item'";
        mysqli_query($conn, $sql);
        header("location: display_food.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
</head>
<body>
    <form action="" method="post">
        <label for="item">
            Food Name:
            <input type="text" name="item" value="<?php echo $item ?>">
        </label>
        <br><br>
        <label for="price">
            Price:
            <input type="number" name="price" value="<?php echo $price ?>">
        </label><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>