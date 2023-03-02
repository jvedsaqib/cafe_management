<?php
    include('connection.php');
    $sql = 'select * from staff_details';
    $data = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <style>
        .table-cashier{
            padding: 20px;
            font-size: 30px;
            width: 100%;
            text-align: center;
        }

        .table-cashier table,th,tr,td{
            padding: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table-admin{
            padding: 20px;
            font-size: 30px;
            width: 100%;
            text-align: center;
        }

        .table-admin table,th,tr,td{
            padding: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <!-- ADMIN TABLE -->
    <div class="table-admin">
        <table>
            <th>ID</th>
            <th>DESIGNATION</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th></th>
            <?php   
                    $sql = 'select * from staff_details';
                    $data = mysqli_query($conn, $sql);
                    while($res = mysqli_fetch_array($data)) {
                    if($res['staff_designation'] == 'Admin'){
                        $id = $res['staff_id'];
                        $desig = $res['staff_designation'];
                        $name = $res['staff_name'];
                        $user = $res['staff_username'];
                        $pass = $res['staff_password'];
                        $img_url = $res['img_url'];
                
                    echo "<tr>
                        <td>$id</td>  
                        <td>$desig</td>  
                        <td>$name</td>  
                        <td>$user</td>  
                        <td>$pass</td>  
                        <td style=\"padding: 2px;\"><img src=\"$img_url\" style=\"height: 120px; width: 100px;\"></td>  
                    </tr>";
                    }
            }?>
                
        </table>
    </div>


    <!-- CASHIER TABLE -->
    <div class="table-cashier">
        <table>
            <th>ID</th>
            <th>DESIGNATION</th>
            <th>NAME</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th></th>
            <?php
                    $sql = 'select * from staff_details';
                    $data = mysqli_query($conn, $sql);   
                    while($res = mysqli_fetch_array($data)) {
                    if($res['staff_designation'] == 'Cashier'){
                        $id = $res['staff_id'];
                        $desig = $res['staff_designation'];
                        $name = $res['staff_name'];
                        $user = $res['staff_username'];
                        $pass = $res['staff_password'];
                        $img_url = $res['img_url'];
                
                    echo "<tr>
                        <td>$id</td>  
                        <td>$desig</td>  
                        <td>$name</td>  
                        <td>$user</td>  
                        <td>$pass</td>  
                        <td style=\"padding: 2px;\"><img src=\"$img_url\" style=\"height: 120px; width: 100px;\"></td>  
                    </tr>";
                    }
            }?>
                
        </table>
    </div>

    <br><br><br>
    <a href="admin.php">Dashboard</a>
</body>

</html>