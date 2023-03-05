<div id="loginModal" class="modal">
    <form class="modal-content animate form-autentification" action="" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Modal"></span>
            <img src="../assets/images/admin.png" alt="Avatar" class="header-admin-icon">
        </div>
        <div class="container">
            <label for="name"><b>Username</b></label>
            <input type="text" placeholder="Enter login" name="name" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            
            <button type="submit" value="Login">Login</button>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
    <?php
        if ($_POST && isset($_POST['login'])) { 
            $statement = $bdd->prepare('SELECT * FROM user WHERE login=:login AND password=:password');
            $statement->bindParam(':login', $_POST['login']);
            $statement->bindParam(':password', $_POST['password']);
            $statement->execute();
            $identification = $statement->fetch(PDO::FETCH_ASSOC);
            if (isset($identification['login'], $identification['password'])) {
                $_SESSION['login']=$identification['login'];
                $_SESSION['password']=$identification['password'];
                header('Location: admin.php');
                exit();
            } else {
                echo "Incorrect authentication! (Wrong login or password)";
            }
        }
    ?>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('loginModal');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

