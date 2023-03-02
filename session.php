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
	session_start();
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['num'] = $_POST['num'];
	$_SESSION['email'] = $_POST['email'];
	header("location: page2.php");
?>
</body>
</html>