<!DOCTYPE html>
<?php
    include ('include/conf.php');
    session_start();
    if(empty($_SESSION['log']) || empty($_SESSION['mp']))
    {
        header("Location: connexio.php");
        die();
    }
?>
<html>
    <head>
        <title>Consulter Categorie</title>
    </head>
    <body>
      <header>
          <?php
            include("include/header.php");
          ?>
      </header>
		<nav>
        <?php
          include("include/nav.php");
        ?>
		</nav>
		<section>
        <h3>Consulter les Categories</h3>
        <?php
            // La creation du formulaire
            echo '<form name="categorieconsulter" action="categorie.php" method="POST">';
                // La liste deroulante
                $select = mysql_query("SELECT cat_code, cat_libelle FROM categorie");
                echo '<select name="cat_libelle">';
                    while($cat_libelle = mysql_fetch_array($select))
                    {
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
            // La creation du table
            $sql = "SELECT cat_code, cat_libelle FROM categorie WHERE cat_libelle ='$cat_libelle'";
            $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
            echo'<table>';
                echo '<tr>';
                    echo '<th>Code Categorie</th>';
                    echo '<th>Libelle Categorie</th>';
                echo '</tr>';
                while($data = mysql_fetch_assoc($req)) {
                    echo '<tr>';
                        echo '<td>'.$data['cat_code'].'</td>';
                        echo '<td>'.$data['cat_libelle'].'</td>';
                    echo '</tr>';
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
