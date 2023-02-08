<?php
    include ('includes/conf.php');
    session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
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
					$basket=$_SESSION['basket'];
					if (sizeof($basket) <= 0) {
						"<tr>";
							echo "<td>Your basket is empty</td>";
						"</tr>";
					} else {
						for ($i=0; $i < $basket; $i++) {
							echo "<tr>";
								echo "<td>" . $basket['productName'][$i] . "</td>";
								echo "<td>" . $basket['quantity'][$i] . "</td>";
								echo "<td>" . $basket['unitPrice'][$i] ."</td>";
								echo "<td>Delete</td>";
							echo "</tr>";
						}
				?>
						<tr>
							<td colspan="2"></td>
							<td colspan="2">Total : <?php MontantGlobal() ?></td>
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
