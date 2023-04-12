<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
/*   if(empty($_SESSION['log']) || empty($_SESSION['mp']))
  {
    header("Location: connexio.php");
    die();
  } */
?>
<html>
	<head>
		<title>Add Product</title>
	</head>
	<?php
        include("include/header.php");
        include("include/nav.php");
    ?>
	<body>
		<section>
      		<h3>Add Product</h3>
			<form name="produitajouter" action="produitAjouter.php" method="POST">
				<table cellspacing="2" cellpadding="2" name="ins">
					<tr>
						<td>Reference Product : </td>
						<td><input type="text" name="pdt_ref"></td>
					</tr>
					<tr>
						<td>Name : </td>
						<td><input type="text" name="pdt_designation"></td>
					</tr>
					<tr>
						<td>Price : </td>
						<td><input type="text" name="pdt_prix"></td>
					</tr>
					<tr>
						<td>Image : </td>
						<td><input type="file" name="pdt_image"></td>
					</tr>
					<tr>             
						<td>Category Product : </td>
            			<td>
              				<?php
								$sql = 'SELECT cat_code, cat_libelle FROM categorie';
								$statement = $bdd->query($sql);
				
								$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
				
								if ($categories) {
									// show the publishers
									echo '<select name="cat_libelle">';
									foreach ($categories as $categorie) {
										echo "<option value=$pdt_categorie[cat_code]>";
											echo $categorie['cat_code'] . '<br>';
										echo '</option>';
									}
									echo '</select>';
								}
	              				?>
            			</td>
          			</tr>
					<tr>
						<td colspan="2"><input type="submit" value="AJOUTER" name="sub"></td>
					</tr>
      			</table>
    		</form>
    		<?php
				// Insertion d'un produit
				if (!empty($_POST['pdt_ref'])) {
					$pdt_ref = $_POST["pdt_ref"];
					$pdt_designation = $_POST["pdt_designation"];
					$pdt_prix = $_POST["pdt_prix"];
					$pdt_image = $_POST["pdt_image"];
					$pdt_categorie = $_POST["pdt_categorie"];

					$sql = "INSERT INTO produit (pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie) VALUES (:pdt_ref, :pdt_designation, :pdt_prix, :pdt_image, :pdt_categorie)";

					$stmt = $bdd->prepare($sql);
					$req = $stmt->execute([
						':pdt_ref' => $pdt_ref,
						':pdt_designation' => $pdt_designation,
						':pdt_prix' => $pdt_prix,
						':pdt_image' => $pdt_image,
						':pdt_categorie' => $pdt_categorie
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
