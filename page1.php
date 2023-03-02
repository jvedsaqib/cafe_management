<?php
include("connection.php");
session_start();
if(empty($_SESSION['staff_id'])){
	die();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>page 1</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap');
		body {
			background-image: radial-gradient(circle, #ddeeee, #e4efe7, #efefe3, #faeee6, #ffeeee);
			background-repeat: no-repeat;
			background-size: cover;
		}

		.container {
			margin-top: 60px;
			margin-left: 30px;
		}

		p,
		form,
		input,
		button {
			font-family: 'Roboto Slab', serif;
			font-size: 40px;
		}

		p {
			color: black;
			font-size: 90px;
		}

		input {
			border-radius: 5px 0px 5px 0px;
		}

		button {
			border-radius: 0px 5px 0px 5px;
		}

		.profile-img{
			display: flex;
    		justify-content: space-between;
		}
		

		.container-img{
            border: 1px solid black;
            border-radius: 24px;
            position: absolute;
            background-image: linear-gradient(#dee, #fee);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
			height: 90px;
			width: 180px;
        }
		#profile{
            border: 1px solid black;
            left: -5%;
            top: -10%;
            border-radius: 50%;
            width: 15%;
            height: 15%;
        }
        img{
            height: 100px;
            width: 240px;
            border-radius: 50%;
        }
		.top-row{
			display: flex;
			justify-content: space-between;
			position: absolute;
			top: 10%;
			right: 10%;
		}
		.left-middle{
			display: flex;
  			justify-content: start;
		}
		.left-view{
			position: relative;
			width: 30%;
			background-image: linear-gradient(#dee, #fee);
		}
		p#l-v-h{
			font-size: 40px;
			text-align: center;
		}
		li#notice{
			font-size: 2em;
    		padding-bottom: 41px;
		}
	</style>
</head>

<body>
	<div class="top-row">
		<div class="container-img">
			<div class="profile-img">
				<img src="assets/images/profile.png" alt="" id="profile">
				<a href="login.php" name="sign_out">Sign-Out</a>
			</div>
			<div class="profile-details">
				<?php
					
					echo "<table>";
					echo "<th>Id</th><th>Cashier Name</th>";
					echo "<tr><td>" . $_SESSION['staff_id'] . "</td><td>" . $_SESSION['staff_name'] . "</td></tr>";
					echo "</table>";
				?>
			</div>
			
		</div>
		
	</div>
		
			
		
	
	</div>

	<div class="left-middle">
		<div class="left-view">
			<div class="left-view-heading">
				<u><p id="l-v-h">Notice</p></u>
			</div>
			<div class="notice-list">
				<?php
					$sql = "select * from notice";
					$res = mysqli_query($conn, $sql);
					echo "<ol>";
					while($row = mysqli_fetch_array($res)){	
				?>
				
					<li id="notice"><?php echo $row['notice_description']; ?></li>
				
				<?php 
					}
					echo "</ol>";
				?>
			</div>
		</div>
	
		<div class="container">
			<p>Welcome</p><br>
			<form action="session.php" method="post">
				<input type="text" name="name" placeholder="Enter your name" required><br><br>
				<input type="number" name="num" placeholder="Enter your number" ><br><br>
				<input type="email" name="email" placeholder="Enter your email" ><br><br>
				<button>Get Menu</button>

			</form>
		</div>
	
	</div>
</body>

</html>



