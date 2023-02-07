<!DOCTYPE html>
<?php
	include ('include/conf.php');
	session_start();
  	if(empty($_SESSION['log']) || empty($_SESSION['mp']))
  	{
    	header("Location: connexio.php");
    	die();
  	}
?>
<html>
	<head>
		<title>Supprimer Categorie</title>
	</head>
	<?php
        include("include/header.php");
        include("include/nav.php");
    ?>
	<body>
		<section>
			<h3>Supprimer une categorie</h3>
			<!-- Liste deroulante -->
			<form name="categoriesupprimer" action="categorieSupprimer.php" method="POST">
				<?php             
					$select = mysql_query("SELECT cat_code, cat_libelle FROM categorie");
					echo '<select name="cat_libelle">';
						while($cat_libelle = mysql_fetch_array($select)) {
							echo "<option>";
								echo $cat_libelle['cat_libelle'];
							echo '</option>';
						}
					echo '</select>';
					if (isset($_POST['cat_libelle'])) {
						$cat_libelle = $_POST["cat_libelle"];   
					}
					// Requete de suppression
					$sql = "DELETE FROM categorie WHERE cat_libelle = '$cat_libelle'"; 
					$requete = mysql_query($sql) or die(mysql_error());
					echo '<input type="submit" value="SUPPRIMER">';
				?> 
			</form>
		</section>
	</body>
	<?php
		include("include/footer.php");
	?> 
</html>
