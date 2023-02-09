<?php
    include ('includes/conf.php');
    session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
/* 	if ($_Get['clear']) {
		session_destroy();
	} */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Basket</title>
	</head>
	
	<body>
		<form method="post" action="panier.php">
			<table style="width: 400px">
				<tr>
					<td colspan="4">Your Basket</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>Quantity</td>
					<td>Unit price</td>
					<td>Action</td>
				</tr>
				<?php
				            //$_SESSION["basket"] = $_GET;

					var_dump($_GET);
					$basket[0]=$_GET;
					if (sizeof($basket) <= 0) {
						"<tr>";
							echo "<td>Your basket is empty</td>";
						"</tr>";
					} else {
						var_dump($basket);
						for ($i=0; $i < sizeof($basket); $i++) {
							echo "<tr>";
			 					echo "<td>" . $basket[0]['productName'] . "</td>";
								echo "<td>" . $basket[0]['quantity'] . "</td>";
								echo "<td>" . $basket[0]['unitPrice'] . "</td>";
								echo "<td>Delete</td>";
							echo "</tr>";
				 		}
				?>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="submit" value="Rafraichir">
								<input type="hidden" name="action" value="refresh">
							</td>
						</tr>
					<?php }
					
				?>
			</table>
		</form>
	</body>
</html>
