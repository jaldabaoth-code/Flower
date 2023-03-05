<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
	session_start();
	if(empty($_SESSION['login']) || empty($_SESSION['password'])) {
		header("Location: connexio.php");
		die();
	}
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
			<h3>Add Category</h3>
			<form name="add-category" action="categorieAjouter.php" method="POST">
				Code Category : <input type="text" name="id">
				Category : <input type="text" name="name">
				<input type="submit" value="Add">
			</form>
			<?php
				if (!empty($_POST['cat_code'])) {
					$categoryId = $_POST["id"];
					$categoryName = $_POST["name"];
					$sql = 'INSERT INTO categorie (cat_code, cat_libelle) VALUES (:id, :name)';
					$stmt = $dataBase->prepare($sql);
					$result = $statement->execute([
						':id' => $categoryId,
						':name' => $categoryName,
					]);
					$publisherCategoryId = $dataBase->lastInsertId();
					echo 'The publisher id ' . $publisherCategoryId . ' was inserted';
				}
			?>
		</section>
	</body>
	<?php
        include("../../includes/footer.php");
	?> 
</html>
