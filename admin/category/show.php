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
            /* The list of categories */
            echo '<form name="categorieconsulter" action="show.php" method="POST">';
                $statement = $bdd->query('SELECT * FROM categorie');
                $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                if ($categories) {
                    echo '<select name="cat_code">';
                        foreach ($categories as $categorie) {
                            echo "<option value=" . $categorie['cat_code'] . ">";
                                echo $categorie['cat_libelle'];
                            echo '</option>';
                        }
                    echo '</select>';
                }
                echo '<input type="submit" value="Consult">';
            echo '</form>';
            if (isset($_POST['cat_code'])) {
                $categoryCode = $_POST["cat_code"];
                $categoryName = $_POST["cat_libelle"];
                $statement = $bdd->prepare('SELECT * FROM categorie WHERE cat_code = :cat_code');
                $statement->bindParam(':cat_code', $cat_code, PDO::PARAM_INT);
                $statement->execute();
                $category = $statement->fetch(PDO::FETCH_ASSOC);
                if ($category) {
                    echo '<h4>Code Categorie : ' . $category['cat_code'] . '</h4>';
                    echo '<h4>Libelle Categorie : ' . $category['cat_libelle'] . '</h4>';
                } else {
                    echo "The publisher with $cat_libelle was not found.";
                }
            }
        ?>
		</section>
    </body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
