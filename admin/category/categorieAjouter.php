<!DOCTYPE html>
<?php
	include ('include/conf.php');
	session_start();
	if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
		header("Location: connexio.php");
		die();
	}
?>
<html>
	<head>
		<title>Ajouter Categorie</title>
	</head>
	<?php
		include("include/header.php");
		include("include/nav.php");
	?>
	<body>
		<section>
			<h3>Ajouter une nouvelle Categorie</h3>
      		<!-- La creation du formulaire -->
			<form name="categorieajouter" action="categorieAjouter.php" method="POST">
				<table name="cateajouter">
				<tr>
					<td>Code Categorie : </td>
					<td><input type="text" name="cat_code"></td>
				</tr>
				<tr>
					<td>Libelle Categorie : </td>
					<td><input type="text" name="cat_libelle"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="AJOUTER"></td>
				</tr>
				</table>
			</form>
			<?php
				// Insertion d'une Categorie
				if (!empty($_POST['cat_code'])) {
					$cat_code = $_POST["cat_code"];
					$cat_libelle = $_POST["cat_libelle"];
					$sql = "INSERT INTO categorie (cat_code, cat_libelle) VALUES ('$cat_code', '$cat_libelle')";
					$req = mysql_query($sql, $cnx) or die(mysql_error());
					if ($req) {
						echo("L'insertion a été correctement effectuée") ;
					} else {
						echo("L'insertion a échouée") ;
					}
				}
			?>
		</section>
	</body>
	<?php
		include("include/footer.php");
	?> 
</html>
