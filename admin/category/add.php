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
				<table name="cateajouter">
				<tr>
					<td>Code Category : </td>
					<td><input type="text" name="cat_code"></td>
				</tr>
				<tr>
					<td>Category : </td>
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
