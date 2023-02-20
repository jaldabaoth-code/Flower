<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
	session_start();
/* 	if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
		header("Location: connexio.php");
		die();
	} */
?>
<html>
	<head>
        <?php
            include '../../includes/head.php';
        ?>
		<title>Add Category</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
	<body>
		<section>
			<h3>Add a new Category</h3>
      		<!-- La creation du formulaire -->
			<form name="categorieajouter" action="categorieAjouter.php" method="POST">
				Code Category :
				<input type="text" name="cat_code">
				Category :
				<input type="text" name="cat_libelle">
				<input type="submit" value="AJOUTER">
			</form>
			<?php
				// Insertion d'une Categorie
				if (!empty($_POST['cat_code'])) {
					$cat_code = $_POST["cat_code"];
					$cat_libelle = $_POST["cat_libelle"];
					$sql = 'INSERT INTO categorie (cat_code, cat_libelle) VALUES (:cat_code, :cat_libelle)';
					$stmt = $bdd->prepare($sql);
					$req = $stmt->execute([
						':cat_code' => $cat_code,
						':cat_libelle' => $cat_libelle,
					]);
					$publisher_id = $bdd->lastInsertId();

					echo 'The publisher id ' . $publisher_id . ' was inserted';
				}
			?>
		</section>
	</body>
	<?php
        include("../../includes/footer.php");
	?> 
</html>
