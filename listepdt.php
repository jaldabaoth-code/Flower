<!DOCTYPE html>
<html>
    <?php
        include ('includes/conf.php');
        session_start();
    ?>
    <head>
        <title>Bulbes Société Lafleur</title>
        <meta charset="utf-8"/>
        <link type="text/css" rel="stylesheet" href="assets/styles/style.css" />
    </head>
    <body>
    <?php
        include 'includes/header.php';
        include 'includes/navbar.php';
    ?>
		<section>
            <?php
                $categ = $_GET['categ'];
                $rep = $bdd->query("SELECT * FROM produit WHERE pdt_categorie='$categ'");
            ?>
                <table>
                    <tr>
                        <th>Images</th>
                        <th>Code</th>
                        <th>Libellé</th>
                        <th>Prix</th>
                    </tr>'
                <?php
                    while ($ligne = $rep->fetch()) {
                        echo '<tr>';
                            echo'<td><img src="images/'.$ligne['pdt_image'].'.jpg" alt="'.$ligne['pdt_image'].'"/></td>';
                            echo '<td>'.$ligne['pdt_ref'].'</td>';
                            echo '<td>'.$ligne['pdt_designation'].'</td>';
                            echo '<td>'.$ligne['pdt_prix'].'</td>';
                        echo'</tr>';
                    }
                echo '</table>';                   
                $rep-> CloseCursor();
                echo '<form action="basket.php" method="get">';
                    echo "Liste des produits : &nbsp;&nbsp;&nbsp;&nbsp; Quantit&eacute; : <br />";
                    echo '<select name="refPdt" size="1">';
                    $categ = $_GET['categ'];
                    $rep = $bdd->query("SELECT pdt_designation FROM produit where pdt_categorie='$categ'");
                        while ($ligne = $rep->fetch()) {
                            echo '<option value="'.$ligne['pdt_designation'].'">'.$ligne['pdt_designation'];'</option>';
                        }
                    $rep-> CloseCursor();
                    // Remplissage de la liste déroulante à partir de la base de données.
                    echo '</select>';
                    echo '&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="quantite" size="5" value="1" />';
                    echo '<p><input type="submit" name="action" value="Ajouter au panier" />';
                echo '</form>';
            ?>             
        </section>
        <footer>
            <h2>copyrights Votre nom réalisé le ...</h2>
        </footer>
    </body>
</html>
