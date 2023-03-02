<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include("connection.php");
?>
<?php 
session_start();
$sql = "insert into inter values(".$_POST["qt"].",'".$_POST['pd']."',".$_SESSION['staff_id'].");";
$result = mysqli_query($conn,$sql);

header("location: page2.php");

?>

</body>
</html>