<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>

        body{
            background-image: linear-gradient(#dee, #fee);
        }
        .middle{
            display: flex;

        }

        .dashboard{
            height: 600px;
            width: 85%;
            background-color: #f4f4f4;
            position: relative;
            top: 20%;
        }
        .box-container{
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .box-1, .box-2, .box-3, .box-4{
            height: 159px;
            width: 252px;
            margin: 10px;   
            border-radius: 22px;
        }
        .box-1, .box-3{
            background-color: #bee4e4;
        }
        .box-2, .box-4{
            background-color: #8a98e4;
        }
        #total{
            font-size: 40px;
            margin-left: 15px;
        }
        #window-heading{
            margin-left: 10px;
        }
        .list-items{
            position: relative;
            left: -15px;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <a href="login.php">Home</a>
    <hr>
    
    <div class="middle">
        <div class="list-items">
        <ul>
            <li>Manage Bills</li>
            <ul>
                <a href="display.php"><li>Display records</li></a>
            </ul>
            <br>
            <li>Manage Items</li>
            <ul>
                <a href="insert_food.php"><li>Insert new Food</li></a>
                <a href="display_food.php"><li>Display Menu</li></a>
            </ul>
            <br>
            <li>Manage Notice</li>
            <ul>
                <a href="edit_board.php"><li>Edit Board</li></a>
            </ul>
            <br>
            <li>Manage Staff</li>
            <ul>
                <a href="manage_staff.php"><li>Manage Staff</li></a>
                <a href="list_staff.php"><li>List Staff</li></a>
            </ul>
        </ul>
        </div>


        <div class="dashboard">
            <p style="margin-left:5px; font-size:30px;">dashboard</p>
            <div class="box-container">
                <div class="box-1">
                    <p id="window-heading">Today's Total</p>
                    <?php
                        include('connection.php');
                        $sql = "SELECT sum(total) as Total FROM `cust_details` WHERE date(payment_date) = CURRENT_DATE;";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($res);
                        $total = number_format((float)$row['Total'], 2, '.', '');
                    ?>
                    <p id="total">
                        <?php echo "Rs ".$total ?>
                    </p>
                </div>
                <div class="box-2">
                    <p id="window-heading">Yesterday's Total</p>
                        <?php
                            include('connection.php');
                            $sql = "SELECT sum(total) as Total FROM `cust_details` WHERE date(payment_date) = CURRENT_DATE-1;";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($res);
                            $total = number_format((float)$row['Total'], 2, '.', '');
                        ?>
                        <p id="total">
                            <?php echo "Rs ".$total ?>
                        </p>
                </div>
                <div class="box-3">
                    <p id="window-heading">Box 3</p>
                </div>
                <div class="box-4">
                    <p id="window-heading">Box 4</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>