<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
    <table>
        <th>Payment_ID</th>
        <th>Customer Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Total</th>
        <th>Payment_date</th>
        <th>cashier</th>
        <?php
            $sql = "select * from cust_details";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>". $row['Payment_ID'] ."</td>";
                echo "<td>". $row['c_name'] ."</td>";
                echo "<td>". $row['phone'] ."</td>";
                echo "<td>". $row['email'] ."</td>";
                echo "<td>". $row['total'] ."</td>";
                echo "<td>". $row['payment_date'] ."</td>";
                echo "<td>". $row['cashier'] ."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br><br><br>
    <a href="admin.php">Dashboard</a>
</body>
</html>