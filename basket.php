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
					<td>Libellé</td>
					<td>Quantité</td>
					<td>Prix Unitaire</td>
					<td>Action</td>
				</tr>
				<?php
					if (basketCreation()) {
						$nbArticles=count($_SESSION['panier']['libelleProduit']);
						if ($nbArticles <= 0)
							echo "<tr><td>Votre panier est vide </ td></tr>";
						else {
							for ($i=0 ;$i < $nbArticles ; $i++) {
								echo "<tr>";
								    echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
								    echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
								    echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
								    echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
								echo "</tr>";
							} ?>
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
					}
				?>
			</table>
		</form>
	</body>
</html>
