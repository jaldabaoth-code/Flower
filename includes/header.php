<header>
    <div class="header-left-side">
        <a href="../admin/admin.php"><img class="header-admin-icon" src="../assets/images/admin.png" title="Admin panel" alt="Admin panel icon"></a>
    </div>
    <div class="header-center-side">
        <h1>Company - The Flower</h1>
        <div class="header-street">6 Rue d'Orléans</div>
        <div class="header-city">45000 Orléans</div>
    </div>
    <div class="header-right-side">
        <div class="header-authentication">
            <button class="header-login" onclick="document.getElementById('loginModal').style.display='block'" style="width:auto;">Login</button>
            <button class="header-register">Sign up</button>
        </div>
        <div class="header-shoping-cart">
            <form action="cart.php" method="GET">
                <input class="header-clean-shoping-cart-icon" type="image" src="../assets/images/empty_basket.png" title="Clean your shopping cart" name="clean" alt="Clean shopping cart icon">
            </form>
            <a href="../cart.php"><img class="header-shoping-cart-icon" src="../assets/images/go_to_basket.png" title="Go to your shopping cart" alt="Shopping cart icon"></a>
        </div>
    </div>
    <?php
        include '../includes/login.php';
    ?>
</header>