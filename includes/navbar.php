<nav>
    <ul class="navbar-ul">
        <li class="navbar-li"><a href="index.php">Home</a></li>
        <?php
            $rep = $bdd->query('SELECT * FROM category');
            while ($ligne = $rep->fetch()) {
                echo '<li class="navbar-li"><a href="listepdt.php?categ=' . $ligne['cat_code'],'">' . $ligne['cat_libelle'],'</a></li>';
            }
            $rep-> CloseCursor();
        ?>
    </ul>
</nav>