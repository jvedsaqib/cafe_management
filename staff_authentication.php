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


    $sql = "select * from staff_details";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row['staff_username'] == $uname && $row['staff_password'] == $password){
            session_start();
            $_SESSION['staff_name'] = $row['staff_name'];
            $_SESSION['staff_id'] = $row['staff_id'];
            $found = true;
            break;
        } else {
            $found = false;
        }
    }    

    if($found == true){
        header("location: page1.php");
    }
    else{
        sleep(5);
        header("location: login.php");
    }

    ?>
</body>
</html>