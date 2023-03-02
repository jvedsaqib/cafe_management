<?php
	session_start();
	if(empty($_SESSION['staff_id'])){
		die();
	}
?>
<!DOCTYPE html>
<html>

<head>
	<style>
		body {
			color: black;
			background-image: radial-gradient(circle, #ddeeee, #e4efe7, #efefe3, #faeee6, #ffeeee);
			background-size: cover;
		}

		.menu {
			width: 50%;
			font-size: 25px;
			border: 1px solid black;
			padding: 10px;
			background-image: linear-gradient(to right top, #ddeeee, #e4efe7, #efefe3, #faeee6, #ffeeee);
			/*background-image: url('assets/images/back-menu.jpg');*/
			background-repeat: no-repeat;
			background-size: cover;
			border-radius: 30px 0px 30px 0px;
		}


		.container-list{
			display: flex;
			position: absolute;
			right: 14px;
			margin-top: 65px;
			height: 266px;
			width: 319px;
			border: 1px solid black;
			flex-direction: column;
		}

		#get-bill, #clear-bill{
			width: 50%;
    		margin: auto;
			margin-top: 13px;
		}

		.action-btn{
			display: flex;
			justify-content: space-between;
		}
	</style>
</head>

<body>
	<center>
		<form class="form" action="number.php" method="post">

			<?php
			include("connection.php");
			$sql = "select * from Food_Details";
			$result = mysqli_query($conn, $sql);
			echo "Food List : <select name='pd'>";
			echo "<option hidden>Select Food</option>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option>" . $row['food_items'] . "</option>";
			}
			echo "</select> ";
			?>
			<input type="number" name="qt" min="1" value="1" max="15" style="width:3%">
			<button>Purchase</button>
			<button><a href="clear_bill.php">Clear Order</a></button>
		</form>
		<br><br><br><br>
		<table class="menu">
			<th>Item Name</th>
			<th>Price</th>

			<?php
			$sql = "select * from Food_Details";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['food_items'] . "</td><td>" . $row['price_per_item'] . "</tr>";
			}
			?>

		</table>
	</center>
	
	
	<div class="container-list">
			<div class="action-btn">
				<button id="get-bill"><a href="bill.php">Get Bill</a></button>
			</div>
		<p align="center">Item(s) added</p>
		<ul class="list">
			<?php
			$sql = "select * from inter where staff_id = ".$_SESSION['staff_id']."";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<li>" . $row['food_items'] . " added qty - " . $row['qty'] . "</li>";
			}
			?>
		</ul>
		
	</div>

</body>

</html>