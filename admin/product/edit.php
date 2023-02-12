<!DOCTYPE html>
<?php
    include ('include/conf.php');
    session_start();
    if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
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
                echo '<form name="categorieconsulter" action="produitModifier.php" method="POST">';
                    // La liste deroulante
                    $select = mysql_query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit");
                    echo '<select name="pdt_ref">';
                        while($pdt_ref = mysql_fetch_array($select)) {
                          echo "<option>";
                              echo $pdt_ref['pdt_ref'];
                          echo '</option>';
                        }
                    echo '</select>';
                    echo '<input type="submit" value="CONSULTER">';
                    if (isset($_POST['pdt_ref'])) {
                        $pdt_ref = $_POST["pdt_ref"];
                    }
                    // La creation du table
                    $sql = "SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit WHERE pdt_ref ='$pdt_ref'";
                    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
                    $pdtref = "";
                    $pdtdesignation = "";
                    $pdtprix = "";
                    $pdtimage = "";
                    $pdtcategorie = "";          
                    while ($data = mysql_fetch_assoc($req)) {
                        $pdtref = $data['pdt_ref'];
                        $pdtdesignation = $data['pdt_designation'];
                        $pdtprix = $data['pdt_prix'];
                        $pdtimage = $data['pdt_image'];
                        $pdtcategorie = $data['pdt_categorie'];
                    }
                echo "</form>";
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
                // Insertion d'une Categorie
                if (!empty($_POST['pdt_designation'])) {
                    $pdtref = $_POST["pdt_ref"];
                    $pdtdesignation = $_POST["pdt_designation"];
                    $pdtprix = $_POST["pdt_prix"];
                    $pdtimage = $_POST["pdt_image"];
                    $pdtcategorie = $_POST["pdt_categorie"];
                    $sql = "UPDATE produit SET pdt_designation = '$pdtdesignation', pdt_prix = '$pdtprix', pdt_image = '$pdtimage', pdt_categorie = '$pdtcategorie' WHERE pdt_ref = '$pdtref'";
                    $req = mysql_query($sql, $cnx) or die(mysql_error());
                    if($req) {
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
