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
                    $select = $bdd->query("SELECT cat_code, cat_libelle FROM categorie");
                    echo '<select name="cat_libelle">';
                        while($cat_libelle = $select->fetch()) {
                            echo "<option>";
                                echo $cat_libelle['cat_libelle'];
                            echo '</option>';
                        }
                    echo '</select>';
                    echo '<input type="submit" value="CONSULTER">';
                    if (isset($_POST['cat_libelle'])) {
                        $cat_libelle = $_POST["cat_libelle"];
                    }
                    // La creation du table

                    $sql = "SELECT cat_code, cat_libelle FROM categorie WHERE cat_libelle ='$cat_libelle'";
                    $req = $bdd->query($sql);
                    $catcode = "";
                    $catlibelle = "";
                    while($data = $req->fetch()) {
                        $catcode = $data['cat_code'];
                        $catlibelle = $data['cat_libelle'];
                    }
                echo "</form>";
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
                // Insertion d'une Categorie
                if (!empty($_POST['cat_code'])) {
                    $cat_code = $_POST["cat_code"];
                    $cat_libelle = $_POST["cat_libelle"];
                    $sql = "UPDATE categorie SET cat_libelle = '$cat_libelle' WHERE cat_code = '$cat_code'";
                    $req = mysql_query($sql, $cnx) or die(mysql_error());
                    if ($req) {
                      echo("La mise à jour a été correctement effectuée") ;
                    } else {
                      echo("La mise à jour a échouée") ;
                    }
                }
                $req-> CloseCursor();
            ?>
        </section>
    </body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
