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
        <title>Produit</title>
    </head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
	<body>
        <section>
            <h3>Consulter les Produits</h3>
            <?php
                echo '<form name="produitconsulter" action="produit.php" method="POST">';
                    $select = $bdd->query("SELECT cat_code, cat_libelle FROM categorie");
                    $sql = 'SELECT cat_code, cat_libelle FROM categorie';
                    $statement = $bdd->query($sql);
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                    if ($categories) {
                        // show the publishers
                        echo '<select name="cat_libelle">';
                        foreach ($categories as $categorie) {
                            echo "<option>";
                                echo $cat_libelle['cat_libelle'] . '<br>';
                            echo '</option>';
                        }
                        echo '</select>';
                    }
                    echo '<input type="submit" value="CONSULTER">';
                echo '</form>';
                if (isset($_POST['cat_libelle'])) {
                    $cat_libelle = $_POST["cat_libelle"];   
                }

                $sql = "SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle ='$cat_libelle'";
                $req = $bdd->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


                $sql = 'SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle = :cat_libelle';
                $statement = $bdd->prepare($sql);
                $statement->bindParam(':cat_libelle', $cat_libelle, PDO::PARAM_INT);
                $statement->execute();
                $produ = $statement->fetch(PDO::FETCH_ASSOC);

                if ($produ) {
                    echo $produ['cat_libelle'] . '.' . $produ['cat_code'];
                } else {
                    echo "The publisher with id $cat_libelle was not found.";
                }
                echo'<table>';
                    echo '<tr>';
                        echo '<th>Code Categorie</th>';
                        echo '<th>Libelle Categorie</th>';
                    echo '</tr>';
                    while($data = $produ) {
                        $fleurChoi = $data['pdt_ref'];
                        $_SESSION['fleurChoi'] = $fleurChoi;
                        echo '<tr>';
                        echo '<td> <a href="produit.php?pdt_ref='.$fleurChoi.'"><img src="images/'.$_SESSION['fleurChoi'].'.jpg"/></a></td>';
                        echo '<td>'.$data['pdt_ref'].'</td>';
                        echo '<td>'.$data['pdt_designation'].'</td>';
                        echo '<td>'.$data['pdt_prix'].'</td>';
                        echo '<td>'.$data['pdt_categorie'].'</td>';
                        echo '</tr>';
                    }
                echo '</table>';
            ?>
        </section>
	</body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
