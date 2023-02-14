<!DOCTYPE html>
<?php
    include ('include/conf.php');
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
            <h3>Supprimer un produit</h3>
            <!-- Liste deroulante -->
            <form name="produitsupprimer" action="produitSupprimer.php" method="POST">
                <?php             
                    $select = $bdd->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit");
                    echo '<select name="pdt_designation">';
                        while($pdt_designation = $select->fetch()) {
                            echo "<option>";
                                echo $pdt_designation['pdt_designation'];
                            echo '</option>';
                        }
                    echo '</select>';
                    if (isset($_POST['pdt_designation'])) {
                        $pdt_designation = $_POST["pdt_designation"];   
                    }
                    // Requete de suppression
                    $sql = "DELETE FROM produit WHERE pdt_designation = '$pdt_designation'"; 
                    $requete = $bdd->query($sql) or die(mysql_error());
                    echo '<input type="submit" value="SUPPRIMER">';
                ?> 
            </form>
        </section>
    </body>
    <?php
        include("include/footer.php");
    ?>
</html>
