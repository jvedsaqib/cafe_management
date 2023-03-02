<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticating...</title>
</head>
<body>
    <?php
    include('connection.php');
    $uname = $_POST['uname'];
    $password = $_POST['password'];


    $sql = "select * from admin_details";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row['admin_username'] == $uname && $row['admin_password'] == $password){
            $found = true;
            break;
        } else {
            $found = false;
        }
    }    

    if($found == true){
        header("location: admin.php");
    }
    else{
        sleep(5);
        header("location: admin_login.php");
    }

    ?>
</body>
</html>