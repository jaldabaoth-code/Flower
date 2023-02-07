<!DOCTYPE html>
<?php
    include ('include/conf.php');
    session_start();
    if (empty($_SESSION['log']) || empty($_SESSION['mp'])) {
        header("Location: connexio.php");
        die();
    }
?>
<html>
    <head>
        <title>Consulter Categorie</title>
    </head>
    <?php
        include("include/header.php");
        include("include/nav.php");
    ?>
    <body>
        <section>
            <h3>Consulter les Categories</h3>
            <?php
                // La creation du formulaire
                echo '<form name="categorieconsulter" action="categorieModifier.php" method="POST">';
                    // La liste deroulante
                    $select = mysql_query("SELECT cat_code, cat_libelle FROM categorie");
                    echo '<select name="cat_libelle">';
                        while($cat_libelle = mysql_fetch_array($select)) {
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
                    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
                    $catcode = "";
                    $catlibelle = "";
                    while($data = mysql_fetch_assoc($req)) {
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
                mysql_close();
            ?>
        </section>
    </body>
    <?php
        include("include/footer.php");
    ?>
</html>
