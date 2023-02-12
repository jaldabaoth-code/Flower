<!DOCTYPE html>
<?php
    include ('../../includes/conf.php');
    session_start();
/*     if(empty($_SESSION['log']) || empty($_SESSION['mp']))
    {
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
            echo '</form>';
            if (isset($_POST['cat_libelle'])) {
                $cat_libelle = $_POST["cat_libelle"];
            }
            $select-> CloseCursor();
            // La creation du table
            $sql = "SELECT cat_code, cat_libelle FROM categorie WHERE cat_libelle ='$cat_libelle'";
            $req = $bdd->query($sql);
            echo'<table>';
                echo '<tr>';
                    echo '<th>Code Categorie</th>';
                    echo '<th>Libelle Categorie</th>';
                echo '</tr>';
                while($data = $req->fetch()) {
                    echo '<tr>';
                        echo '<td>'.$data['cat_code'].'</td>';
                        echo '<td>'.$data['cat_libelle'].'</td>';
                    echo '</tr>';
                }
            echo '</table>';
/*             mysql_close(); */
            $req-> CloseCursor();
        ?>
		</section>
    </body>
    <?php
        include("../../includes/footer.php");
    ?>
</html>
