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
                </tr>
                <?php while ($ligne = $rep->fetch()) { ?>
                    <tr>
                        <td><?php echo "<img src=./assets/images/" . $ligne['pdt_image'] . ".jpg>" ?></td>
                        <td><?php echo $ligne['pdt_ref'] ?></td>
                        <td><?php echo $ligne['pdt_designation'] ?></td>
                        <td><?php echo $ligne['pdt_prix'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <?php $rep-> CloseCursor(); ?> 
            <form action="basket.php" method="get">
                Products List : Quantity
                <select name="refPdt" size="1">
                    <?php
                        $categ = $_GET['categ'];
                        $rep = $bdd->query("SELECT pdt_designation FROM produit where pdt_categorie='$categ'");
                            while ($ligne = $rep->fetch()) {
                                echo '<option value="'.$ligne['pdt_designation'].'">'.$ligne['pdt_designation'];'</option>';
                            }
                        $rep-> CloseCursor();
                    ?>   
                </select>
                <input type="text" name="quantite" size="5" value="1">
                <input type="submit" name="action" value="Add to Basket">
            </form>
        </section>
    </body>
    <?php
        include 'includes/footer.php';
    ?>
</html>
