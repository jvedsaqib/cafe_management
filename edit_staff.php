<?php
    include('connection.php');
    $id = $_GET['staff_id'];
    $res = mysqli_query($conn, "select * from staff_details where staff_id = \"$id\"");

    $row=mysqli_fetch_array($res);
    $staff_name = $row['staff_name'];
    $staff_username = $row['staff_username'];
    $staff_password = $row['staff_password'];

    if(isset($_POST['update'])){

        $updated_staff_name = $_POST['staff_name'];
        $updated_staff_username = $_POST['staff_username'];
        $updated_staff_password = $_POST['staff_password'];

        $sql = "UPDATE staff_details SET 
            staff_name = '$updated_staff_name',
            staff_username = '$updated_staff_username',
            staff_password = '$updated_staff_password'
                where staff_id = '$id'";
        mysqli_query($conn, $sql);
        header("location: manage_staff.php");
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
        <label for="name">
            Staff Name:
            <input type="text" name="staff_name" value="<?php echo $staff_name ?>">
        </label>
        <br><br>
        <label for="user">
            Staff Username:
            <input type="text" name="staff_username" value="<?php echo $staff_username ?>">
        </label>
        <br><br>
        <label for="password">
            Staff Password:
            <input type="text" name="staff_password" value="<?php echo $staff_password ?>">
        </label>
        <br><br>
        
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>