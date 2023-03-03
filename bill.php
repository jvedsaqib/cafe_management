<?php
	session_start();
	if(empty($_SESSION['staff_id'])){
		die();
	}
?>
<html>
<head>
	<style>
		table {
			border: 1px solid black;
			width: 50%;
			margin-left: 50%;
			transform: translate(-50%);
		}

		th {
			font-family: Georgia, 'Times New Roman', Times, serif;
			font-size: 20px;
			border-bottom: 1px dashed black;
			padding-right: 20px;
			padding-left: 20px;
		}

		td {
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
			font-size: 15px;
			border-top: 1px dashed black;
			padding-right: 20px;
			padding-left: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<?php
		include("connection.php");
		$delivery_charge = false;
		$coupon = false;

		$sql = "select price_per_item,inter.qty from food_details, inter
       where food_details.food_items = inter.food_items";
		$result = mysqli_query($conn, $sql);
		$sum = 0;
		$discount = 0;
		$net_price = 0;
		$email = $_SESSION['email'];
		while ($row = mysqli_fetch_assoc($result)) {
			$price_per_item = $row['price_per_item'];
			$qty = $row['qty'];

			$sum = $sum + ($price_per_item * $qty);
		}

		if ($sum < 1000) {
			$sum += 50;
			$delivery_charge = true;
			$net_price = $sum + (0.15 * $sum);
		} else if ($sum > 5000) {
			$discount = $sum - (0.05 * $sum);
			$net_price = $discount + (0.15 * $discount);
			$coupon = true;
		} else {
			$net_price = $sum + (0.15 * $sum);
		}

		echo "<h1><u>Your Bill</u></h1>";

		$qry = "SELECT * FROM inter";
		$res = mysqli_query($conn, $qry);

		echo "<table>";
		echo "<th>Item</th>
			  <th>Qty</th>";
		echo "<th>Price</th>";
		while($row = mysqli_fetch_assoc($res)){
			$inner_qty = (float)$row['qty'];
			$inner_qry = "select price_per_item from food_details where food_items =  '". $row['food_items'] ."';";
			$item_price = mysqli_fetch_array(mysqli_query($conn, $inner_qry));
			echo "<tr>";
			echo "<td>". $row['food_items'] ."</td>";
			echo "<td>". $row['qty'] ."</td>";
			echo "<td>" . $item_price['price_per_item'] * $inner_qty ."</td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<br><br>";

		echo "<table>";
		echo "<th>Customer Name</th>
			  <th>Total Price</th>";
		if ($coupon) {
			echo "<th>Discounted Price</t>";
		}
		echo "<th>Net Price</th>";
		echo "<tr>";
		echo "<td>" . $_SESSION['name'] . "</td>";
		echo "<td>" . $sum . "</td>";
		if ($coupon) {
			echo "<td>" . $discount . "</td>";
		}
		echo "<td>" . $net_price . "</td>";

		echo "</table>";

		if($_SESSION['num'] == null){
			$_SESSION['num'] = 0;
		}


		$sql = "insert into cust_details(c_name,phone,email,total,cashier) values('".$_SESSION['name']."',".$_SESSION['num'].",'". $_SESSION['email'] ."',".$net_price.",'". $_SESSION['staff_name'] ."');";
		mysqli_query($conn, $sql);

		if ($delivery_charge) {
			echo "<b><p>Rs 50 added if the total amount is less than 1000</p><b>";
		} else if ($coupon) {
			echo "<b>Coupon Added if the total amount is greater than 5000<b>";
		}



		$sql = "DELETE FROM `inter` where staff_id = ". $_SESSION['staff_id'] ."";
		mysqli_query($conn, $sql); 

		?>


		<br>
		<br>
		<br>
		<a href="page1.php">Go back</a>
	</div>

	<?php
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
	
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';  
  require 'phpmailer/src/SMTP.php';
  
  
  if($email != null){
	$mail = new PHPMailer(true);
	                                      
	  $mail->isSMTP();                                            
	  $mail->Host       = 'smtp.gmail.com;';                    
	  $mail->SMTPAuth   = true;                             
	  $mail->Username   = 'jvedsaqib1@gmail.com';                 
	  $mail->Password   = '';                        
	  $mail->SMTPSecure = 'tls';                              
	  $mail->Port       = 587;  
	
	
	  $mail->setFrom('jvedsaqib1@gmail.com', 'Saqib');           
	  $mail->addAddress($email);
		                        
	  $mail->isHTML(true);
	  $mail->Subject = 'Your order is placed!';
	  $msg = "Thank you for your order !
				Here is our invoice details
					Customer Name :: " . $_SESSION['name'] . "
					Order Total :: " . $net_price . "
					Order Time :: " . date('d-m-y') . "
					Cashier :: " . $_SESSION['staff_name'] . "
  				Visit us soon !";
	  $mail->Body    = "
							<h1>Thank you for visiting us!</h1>
							<p>Below is your order receipt</p>
							<table style='height: 90px; width: 100%; border-collapse: collapse; float: left; background-color: #f3f3f3;' border='0'>
							<tbody>
							<tr style=\"height: 18px;\">
							<td style=\"width: 50%; height: 18px;\">Customer Name</td>
							<td style=\"width: 50%; height: 18px;\">" . $_SESSION['name'] . "</td>
							</tr>
							<tr style=\"height: 18px;\">
							<td style=\"width: 50%; height: 18px;\">Net Price</td>
							<td style=\"width: 50%; height: 18px;\">" . $net_price . "</td>
							</tr>
							<tr style=\"height: 18px;\">
							<td style=\"width: 50%; height: 18px;\">Payment Date</td>
							<td style=\"width: 50%; height: 18px;\">" . date('d-m-y') . "</td>
							</tr>
							<tr style=\"height: 18px;\">
							<td style=\"width: 50%; height: 18px;\">Cashier ID</td>
							<td style=\"width: 50%; height: 18px;\">" . $_SESSION['staff_id'] . "</td>
							</tr>
							</tbody>
							</table>
							<p>&nbsp;</p>
							<p>Visit us again !</p>
							<p>&nbsp;</p>
						";


		
	  
	  $mail->send();
  }
  
  ?>

	<?php
	/*
	require_once('ultramsg.class.php');

	$token="gkujrp23p68rhjh6"; // Ultramsg.com token
	$instance_id="instance22101"; // Ultramsg.com instance id
	$client = new UltraMsg\WhatsAppApi($token,$instance_id);

	$to="+91".$_SESSION['num'].""; 
	$api=$client->sendChatMessage($to,$msg);
	*/

	?>

</body>

</html>