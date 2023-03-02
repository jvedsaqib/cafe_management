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
            /*background-image: linear-gradient(#dee, #fee);*/
        }
        .container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .admin-panel{
			display: flex;
			justify-content: right;
			flex-direction: column;
		}
    </style>
</head>
<body>
    <div class="admin-panel">
		<a href="login.php">Go back</a><br><br>
	</div>
    
    <div class="container">
            <img src="assets/images/logo.png">
             <br><br>
            <form action="admin_authentication.php" method="post">
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