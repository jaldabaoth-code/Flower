<!DOCTYPE html>
<html>
    <?php
        include ('includes/conf.php');
        session_start();
    ?>
    <head>
        <title>Bulbes Société Lafleur</title>
        <?php
            include 'includes/head.php';
        ?>
    </head>
    <body>
    <?php
        include 'includes/header.php';
        include 'includes/navbar.php';
    ?>
        <form action="basket.php" method="GET">
            <section>
                <table>
                    <tr>
                        <th>Images</th>
                        <th>Code</th>
                        <th>Libellé</th>
                        <th>Prix</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $categ = $_GET['categ'];
                        $sql = 'SELECT * FROM produit where pdt_categorie=:categ';
                        $statement = $bdd->prepare($sql);
                        $statement->bindParam(':categ', $categ, PDO::PARAM_INT);
                        $statement->execute();
                        $categori = $statement->fetch(PDO::FETCH_ASSOC);
                        foreach ($categories as $ligne) {
                            echo '<tr>';
                                echo "<td><img src=./assets/images/" . $ligne['pdt_image'] . ".jpg></td>";
                                echo "<td>" . $ligne['pdt_ref'] . "<input type='hidden' name='reference' value='$ligne[pdt_ref]'></td>";
                                echo "<td>" . $ligne['pdt_designation'] . "<input type='hidden' name='productName' value='$ligne[pdt_designation]'></td>";
                                echo "<td>" . $ligne['pdt_prix'] . "<input type='hidden' name='unitPrice' value='$ligne[pdt_prix]'></td>";
                                echo '<td><input type="text" name="quantity" size="5" value="1"></td>';
                                echo '<td><input type="submit" name="action" value="Add to Basket"></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </form>
        </section>
    </body>
    <?php
        include 'includes/footer.php';
    ?>
</html>
