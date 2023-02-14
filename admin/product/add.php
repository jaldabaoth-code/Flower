<!DOCTYPE html>
<?php
	include ('include/conf.php');

  session_start();
/*   if(empty($_SESSION['log']) || empty($_SESSION['mp']))
  {
    header("Location: connexio.php");
    die();
  } */
?>
<html>
	<head>
		<title>Ajouter Produit</title>
	</head>
	<?php
        include("include/header.php");
        include("include/nav.php");
    ?>
	<body>
		<section>
      		<h3>Ajouter un nouveau Produit</h3>
			<form name="produitajouter" action="produitAjouter.php" method="POST">
				<table cellspacing="2" cellpadding="2" name="ins">
					<tr>
						<td>Reference Produit : </td>
						<td><input type="text" name="pdt_ref"></td>
					</tr>
					<tr>
						<td>Designation Produit : </td>
						<td><input type="text" name="pdt_designation"></td>
					</tr>
					<tr>
						<td>Prix Produit : </td>
						<td><input type="text" name="pdt_prix"></td>
					</tr>
					<tr>
						<td>Image Produit : </td>
						<td><input type="file" name="pdt_image"></td>
					</tr>
					<tr>             
						<td>Categorie Produit : </td>
            			<td>
              				<?php
                				$select = $bdd->query("SELECT cat_code FROM categorie");
								echo '<select name="pdt_categorie">';
									while($pdt_categorie = $select->fetch()) {
										echo "<option value=$pdt_categorie[cat_code]>";
										echo $pdt_categorie['cat_code'];
										echo '</option>';      
									}
								echo '</select>';
              				?>
            			</td>
          			</tr>
					<tr>
						<td colspan="2"><input type="submit" value="AJOUTER" name="sub"></td>
					</tr>
      			</table>
    		</form>
    		<?php
      			if (!empty($_POST['pdt_ref'])) {
					$pdt_ref = $_POST["pdt_ref"];
					$pdt_designation = $_POST["pdt_designation"];
					$pdt_prix = $_POST["pdt_prix"];
					$pdt_image = $_POST["pdt_image"];
					$pdt_categorie = $_POST["pdt_categorie"];
       				$sql = "INSERT INTO produit (pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie) VALUES ('$pdt_ref', '$pdt_designation', '$pdt_prix', '$pdt_image', '$pdt_categorie')";
       				$requete = mysql_query($sql, $cnx) or die(mysql_error());

       				$sql = "INSERT INTO produit (pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie) VALUES (:pdt_ref, :pdt_designation, :pdt_prix, :pdt_image, :pdt_categorie)";
					$stmt = $db->prepare($sql);
					$req = $stmt->execute([
						':pdt_ref' => $pdt_ref

					]);
					if ($requete) {
						echo("L'insertion a été correctement effectuée");
					} else {
						echo("L'insertion à échouée") ;
					}
   		  		}
   			?>
		</section>
	</body>
	<?php
		include("include/footer.php");
	?> 
</html>
