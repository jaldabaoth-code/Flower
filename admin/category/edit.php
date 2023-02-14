<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
/*     if (empty($_SESSION['log']) || empty($_SESSION['mp'])) {
        header("Location: connexio.php");
        die();
    } */
?>
<html>
	<head>
        <?php
            include '../../includes/head.php';
        ?>
		<title>Edit Category</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
    <body>
        <section>
            <h3>Consulter les Categories</h3>
            <?php
                // La creation du formulaire
                echo '<form name="categorieconsulter" action="categorieModifier.php" method="POST">';
                    // La liste deroulante
                    $sql = 'SELECT cat_code, cat_libelle FROM categorie';
                    $statement = $bdd->query($sql);
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($categories) {
                        // show the publishers
                        echo '<select name="cat_libelle">';
                            foreach ($categories as $categorie) {
                            echo "<option>";
                                echo $categorie['cat_libelle'];
                            echo '</option>';
                            }
                        echo '</select>';
                        echo '<input type="submit" value="CONSULTER">';
                    }

                    $cat_libelle = "";
                    if (isset($_POST['cat_libelle'])) {
                        $cat_libelle = $_POST["cat_libelle"];
                    }
          
                    $sql = 'SELECT * FROM categorie WHERE cat_libelle =:cat_libelle';
                    $statement = $db->prepare($sql);
          /*           $statement->bindParam(':cat_code', $cat_code, PDO::PARAM_STR); */
                    $statement->bindParam(':cat_libelle', $cat_libelle, PDO::PARAM_STR);
                    $statement->execute();
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
          
                    foreach ($categories as $categorie) {
                            $catcode = $categorie['cat_code'];
                            $catlibelle = $categorie['cat_libelle'];
                            echo "1";
                            // 
                            echo "<form name='categorieconsulter' action='categorieModifier.php' method='POST'>";
                                echo "<table align='center' name='cateajouter'>";
                                echo "<tr align='center'>";
                                    echo "<td>Code Categorie : </td>";
                                    echo "<td><input type='text' name='cat_code' value='$catcode'></td>";
                                echo "</tr>";
                                echo "<tr align='center'>";
                                    echo "<td>Libelle Categorie : </td>";
                                    echo "<td><input type='text' name='cat_libelle' value='$catlibelle'></td>";
                                echo "</tr>";
                                echo "<tr align='center'>";
                                    echo "<td colspan='2'><input type='submit' value='MODIFIER'></td>";
                                echo "</tr>";
                                echo "</table>";
                            echo "</form>";
                        }
                                  
                // Insertion d'une Categorie
                if (!empty($_POST['cat_code'])) {
                    $cat_code = $_POST["cat_code"];
                    $cat_libelle = $_POST["cat_libelle"];
                    $sql = "UPDATE categorie SET cat_libelle = :cat_libelle WHERE cat_code = :cat_code";
                    //$req = mysql_query($sql, $cnx) or die(mysql_error());
                    $statement = $bdd->prepare($sql);

                    $statement->bindParam(':cat_code', $cat_code, PDO::PARAM_INT);
                    $statement->bindParam(':cat_libelle', $cat_libelle);

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
