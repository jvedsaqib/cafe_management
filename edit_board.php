<?php
include("connection.php");
session_start();
/*if(empty($_SESSION['staff_id'])){
	die();
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board</title>
    <style>
        .left-view{
			position: relative;
			width: 100%;
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
    <a href="admin.php">To dashboard</a>
    <?php
        function signout(){
            header("location: admin.php");
        }
    ?>
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
                <button name="edit_notice"><a href="edit_board.php?notice_id=<?php echo $row['notice_id']?>">Edit</a></button>
        <?php 
            }
            echo "</ol>";
        ?>
    </div>
    </div>
    <?php
        if(isset($_GET['notice_id'])){
            $_SESSION['notice_id'] = $_GET['notice_id'];
    ?>
            <form action="edit_board.php" method="post">
                <label for="notice_description">
                    Enter Description:
                    <input type="text" name="desc">
                </label>
                <input type="submit" value="Submit" name="submit">
            </form>
    <?php
        }
        if(isset($_POST['submit'])){
            $id = $_SESSION['notice_id'];
            $desc = $_POST['desc'];
            $sql = "UPDATE notice SET notice_description = '$desc' where notice_id = $id;";
            mysqli_query($conn, $sql);
            unset($_SESSION['notice_id']);
            header("location: edit_board.php");
        }
    ?>
</body>
</html>