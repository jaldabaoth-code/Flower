
<!DOCTYPE html>
<?php
    include ('include/conf.php');
    var_dump($_GET);
    session_start();
    if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
        header("Location: connexio.php");
        die();
    }
?>
<html>
    <head>
        <title>Consulter Produit</title>
    </head>
    <?php
        include("include/header.php");
        include("include/nav.php");
    ?>
	  <body>
        <section>
            <h3>Consulter les Produits</h3>
            <?php
                echo '<form name="produitconsulter" action="produit.php" method="POST">';
                    $select = mysql_query("SELECT cat_code, cat_libelle FROM categorie");
                    echo '<select name="cat_libelle">';
                        while($cat_libelle = mysql_fetch_array($select)) {
                            echo "<option>";
                                echo $cat_libelle['cat_libelle'];
                            echo '</option>';
                        }
                    echo '</select>';
                    echo '<input type="submit" value="CONSULTER">';
                echo '</form>';
                if (isset($_POST['cat_libelle'])) {
                    $cat_libelle = $_POST["cat_libelle"];   
                }
                $sql = "SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle ='$cat_libelle'";
                $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
                echo'<table>';
                    while($data = mysql_fetch_assoc($req)) {
                        $fleurChoi = $data['pdt_ref'];
                        $_SESSION['fleurChoi'] = $fleurChoi;
                        echo "<tr>";
                            echo '<td> <a href="produit.php?pdt_ref='.$fleurChoi.'"><img src="images/'.$_SESSION['fleurChoi'].'.jpg"/></a></td>';
                            echo '<td>'.$data['pdt_ref'].'</td>';
                            echo '<td>'.$data['pdt_designation'].'</td>';
                            echo '<td>'.$data['pdt_prix'].'</td>';
                            echo '<td>'.$data['pdt_categorie'].'</td>';
                        echo "</tr>";
                    }
                echo '</table>';
                mysql_close();
            ?>
        </section>
	  </body>
    <?php
        include("include/footer.php");
    ?> 
</html>
