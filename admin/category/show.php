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
		<title>Category</title>
	</head>
    <?php
        include '../../includes/header.php';
        include '../includes/navbar.php';
    ?>
    <body>
		<section>
        <h3>View Categories</h3>
        <?php
            // La creation du formulaire
            echo '<form name="categorieconsulter" action="category.php" method="POST">';
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

            $sql = 'SELECT cat_code, cat_libelle FROM categorie WHERE cat_libelle = :cat_libelle';
            $statement = $bdd->prepare($sql);
            $statement->bindParam(':cat_libelle', $cat_libelle, PDO::PARAM_INT);
            $statement->execute();
            $categori = $statement->fetch(PDO::FETCH_ASSOC);

            if ($categori) {
                echo $categori['cat_libelle'] . '.' . $categori['cat_code'];
            } else {
                echo "The publisher with id $cat_libelle was not found.";
            }

            echo'<table>';
                echo '<tr>';
                    echo '<th>Code Categorie</th>';
                    echo '<th>Libelle Categorie</th>';
                echo '</tr>';
                while($data = $categori) {
                    echo '<tr>';
                        echo '<td>'.$data['cat_code'].'</td>';
                        echo '<td>'.$data['cat_libelle'].'</td>';
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
