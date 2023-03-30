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
		<title>Edit Product</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
    <body>
        <section>
            <h3>Edit Product</h3>
            <?php
                // La creation du formulaire
                echo '<form name="produitconsulter" action="produitModifier.php" method="POST">';

                    $sql = 'SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit';
                    $statement = $bdd->query($sql);
                    $produits = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($produits) {
                        // show the publishers
                        echo '<select name="pdt_ref">';
                            foreach ($produits as $produit) {
                                echo "<option>";
                                    echo $produit['pdt_ref'];
                                echo '</option>';
                            }
                        echo '</select>';
                        echo '<input type="submit" value="CONSULTER">';
                    }
                echo '</form>';
                if (isset($_POST['pdt_ref'])) {
                    $pdt_ref = $_POST["pdt_ref"];
                }

                $sql = 'SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit WHERE pdt_ref =:pdt_ref';
                $statement = $bdd->query($sql);
                $produits = $statement->fetchAll(PDO::FETCH_ASSOC);
                // La creation du table

                foreach ($produits as $produit) {
                    $pdtref = $produit['pdt_ref'];
                    $pdtdesignation = $produit['pdt_designation'];
                    $pdtprix = $produit['pdt_prix'];
                    $pdtimage = $produit['pdt_image'];
                    $pdtcategorie = $produit['pdt_categorie'];

                    echo "<form name='categorieconsulter' action='produitModifier.php' method='POST'>";
                        echo "<table align='center' name='cateajouter'>";
                            echo "<tr align='center'>";
                                echo "<td>Reference Produit : </td>";
                                echo "<td><input type='text' name='pdt_ref' value='$pdtref'></td>";
                            echo "</tr>";
                            echo "<tr align='center'>";
                                echo "<td>Designation Produit : </td>";
                                echo "<td><input type='text' name='pdt_designation' value='$pdtdesignation'></td>";
                            echo "</tr>";
                            echo "<tr align='center'>";
                                echo "<td>Prix Produit : </td>";
                                echo "<td><input type='text' name='pdt_prix' value='$pdtprix'></td>";
                            echo "</tr>";
                            echo "<tr align='center'>";
                                echo "<td>Image Produit : </td>";
                                echo "<td><input type='text' name='pdt_image' value='$pdtimage'></td>";
                            echo "</tr>";
                            echo "<tr align='center'>";
                                echo "<td>Categorie Produit : </td>";
                                echo "<td><input type='text' name='pdt_categorie' value='$pdtcategorie'></td>";
                            echo "</tr>";
                            echo "<tr align='center'>";
                                echo "<td colspan='2'><input type='submit' value='MODIFIER'></td>";
                            echo "</tr>";
                        echo "</table>";
                    echo "</form>";
                }

               // EDit d'un Produit
                if (!empty($_POST['pdt_designation'])) {
                    $pdtref = $_POST["pdt_ref"];
                    $pdtdesignation = $_POST["pdt_designation"];
                    $pdtprix = $_POST["pdt_prix"];
                    $pdtimage = $_POST["pdt_image"];
                    $pdtcategorie = $_POST["pdt_categorie"];
                    $sql = "UPDATE produit SET pdt_designation = :pdtdesignation, pdt_prix = :pdtprix, pdt_image = :pdt_image, pdt_categorie = :pdt_categorie WHERE pdt_ref = :pdt_ref";
                    $statement = $bdd->prepare($sql);
                    $statement->bindParam(':pdt_ref', $pdtref);
                    $statement->bindParam(':pdtdesignation', $pdtdesignation);
                    $statement->bindParam(':pdtprix', $pdtprix);
                    $statement->bindParam(':pdt_image', $pdtimage);
                    $statement->bindParam(':pdt_categorie', $pdtcategorie);
                    // execute the UPDATE statment
                    if ($statement->execute()) {
                        echo 'The publisher has been updated successfully!';
                    }
                }
            ?>
        </section>
    </body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
