<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
    if(empty($_SESSION['log']) || empty($_SESSION['mp'])) {
        header("Location: connexio.php");
        die();
    }
?>
<html>
    <head>
        <?php
            include '../../includes/head.php';
        ?>
        <title>Show Product</title>
    </head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
	<body>
        <section>
            <h3>Show Product</h3>
            <?php
                echo '<form name="produitconsulter" action="product.php" method="POST">';
                    $statement = $bdd->query('SELECT * FROM categorie');
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                    if ($categories) {
                        // show the publishers
                        echo '<select name="cat_libelle">';
                        foreach ($categories as $categorie) {
                            echo "<option>";
                                echo $categorie['cat_libelle'] . '<br>';
                            echo '</option>';
                        }
                        echo '</select>';
                    }
                    echo '<input type="submit" value="CONSULTER">';
                echo '</form>';
                if (isset($_POST['cat_libelle'])) {
                    $categorie = $_POST["cat_libelle"];   
                }
                $sql = 'SELECT * FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle = :cat_libelle';
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
