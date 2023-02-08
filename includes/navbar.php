<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li>Our products</li>
        <?php
            $rep = $bdd->query('SELECT * FROM categorie');
            while ($ligne = $rep->fetch()) {
                echo '<li><a href="listepdt.php?categ=' . $ligne['cat_code'],'">' . $ligne['cat_libelle'],'</a></li>';
            }
            $rep-> CloseCursor();
        ?>
    </ul>
</nav>
