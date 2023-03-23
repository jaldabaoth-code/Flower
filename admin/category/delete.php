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
			<h3>Delete Category</h3>
			<!-- Liste deroulante -->
			<form name="categoriesupprimer" action="categorieSupprimer.php" method="POST">
				<?php             
					$sql = 'SELECT cat_code, cat_libelle FROM categorie';
					$statement = $bdd->query($sql);
					$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
					if ($categories) {
						// Show the publishers
						echo '<select name="cat_libelle">';
							foreach ($categories as $categorie) {
								echo "<option>";
									echo $categorie['cat_libelle'];
								echo '</option>';
							}
						echo '</select>';
						echo '<input type="submit" value="CONSULTER">';
					}
					if (isset($_POST['cat_libelle'])) {
						$cat_libelle = $_POST["cat_libelle"];   
					}
					// Requete de suppression
					$sql = 'DELETE FROM categorie WHERE cat_libelle = :cat_libelle';
					$statement = $bdd->prepare($sql);
					$statement->bindParam(':cat_libelle', $cat_libelle, PDO::PARAM_STR);
					echo '<input type="submit" value="SUPPRIMER">';
					if ($statement->execute()) {
						echo 'cat libelle ' . $cat_libelle . ' was deleted successfully.';
					}
				?> 
			</form>
		</section>
	</body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
