<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
/*   	if(empty($_SESSION['log']) || empty($_SESSION['mp']))
  	{
    	header("Location: connexio.php");
    	die();
  	} */
?>
<html>
	<head>
        <?php
            include '../../includes/head.php';
        ?>
		<title>Delete Category</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
	<body>
		<section>
			<h3>Supprimer une categorie</h3>
			<!-- Liste deroulante -->
			<form name="categoriesupprimer" action="categorieSupprimer.php" method="POST">
				<?php             
					$select = $bdd->query("SELECT cat_code, cat_libelle FROM categorie");
					echo '<select name="cat_libelle">';
						while($cat_libelle = $select->fetch()) {
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
					$requete = $bdd->query($sql);
					echo '<input type="submit" value="SUPPRIMER">';
				?> 
			</form>
		</section>
	</body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
