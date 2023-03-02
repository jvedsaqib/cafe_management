
<?php
include("connection.php");
session_start();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap');
        *{
            font-size: 30px;
            font-family: 'Roboto Slab', serif;
        }
        body{
            width: 100%;
            height: 100%;
            background-image: linear-gradient(#dee, #fee);
        }
        .container{
            border: 1px solid black;
            border-radius: 24px;
            position: absolute;
            background-image: linear-gradient(#dee, #fee);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
        }
        .admin-panel{
			display: flex;
            justify-content: space-between;
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
        
    </style>
</head>
<body>
    <div class="admin-panel">
		<a href="admin_login.php">Admin-Panel</a><br><br>
        <img src="assets/images/logo.png" alt="">
	</div>
    
        
    
    <div class="container">
        <div class="profile-img">
            <img src="assets/images/profile.png" alt="" id="profile">
        </div>
            <h1>A very good day to you!</h1>
            <form action="staff_authentication.php" method="post">
            <label for="username">
                Username:
                <input type="text" name="uname" required>
            </label>
            <br><br>
            <label for="password">
                Password:
                <input type="password" name="password" max=32 min=8 required>
            </label>
            <br><br>
            <button>Log in</button>
            </form>
    </div>
</body>
</html>