<nav>
    <ul class="navbar-ul">
        <li class="navbar-li">
            <a href="index.php">Home</a>
        </li>
        <?php
            $result = $dataBase->query('SELECT * FROM category');
            while ($line = $result->fetch()) {
                echo '<li class="navbar-li">';
                    echo '<a href="listepdt.php?categ=' . $line['id'] . '">' . $line['name'] . '</a>';
                echo '</li>';
            }
            $result->CloseCursor();
        ?>
    </ul>
</nav>
