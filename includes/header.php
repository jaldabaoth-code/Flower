<header>
    <div class="left">
        <a href= "admin/accueil.php">Admin</a>
    </div>

    <div class="center">
        <h1>Company - The Flower</h1>
        <div class="title-street">6 Rue d'Orléans</div>
        <div class="title-city">45000 Orléans</div>
    </div>

    <div id="basketCreation" class="right">
        <div>
            <a href= "admin/accueil.php">Register</a>
            <a href= "admin/accueil.php">Login</a>
        </div>
        <div>
            <form action="basket.php" method="GET">
                <input type="submit" name="clear" value="Clear the basket">
            </form>
            <form action="order.php" method="GET">
                <p><input type="submit" value="Order">
            </form>
        </div>
    </div>
</header>
