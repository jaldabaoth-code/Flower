<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
/*     if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
        header("Location: connexio.php");
        die();
    } */
?>
<html>
    <head>
        <?php
            include '../../includes/head.php';
        ?>
		<title>Delete Product</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
    <body>
        <section>
            <h3>Delete Product</h3>
            <form name="produitsupprimer" action="produitSupprimer.php" method="POST">
                <?php             
                    $sql = 'SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit';
					$statement = $bdd->query($sql);
					$produits = $statement->fetchAll(PDO::FETCH_ASSOC);
					if ($produits) {
						echo '<select name="pdt_designation">';
							foreach ($produits as $produit) {
								echo "<option>";
									echo $produit['pdt_designation'];
								echo '</option>';
							}
						echo '</select>';
					}
					if (isset($_POST['pdt_designation'])) {
						$pdt_designation = $_POST["pdt_designation"];   
					}

					$sql = 'DELETE FROM produit WHERE pdt_designation = :pdt_designatione';
					$statement = $bdd->prepare($sql);
					$statement->bindParam(':pdt_designatione', $pdt_designation, PDO::PARAM_STR);
					echo '<input type="submit" value="SUPPRIMER">';
					if ($statement->execute()) {
						echo 'cat libelle ' . $pdt_designation . ' was deleted successfully.';
					}
                ?> 
            </form>
        </section>
    </body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
