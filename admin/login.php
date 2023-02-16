<!DOCTYPE html>
<html>
	<?php
		include ('../includes/conf.php');
		session_start();
	?>
	<head>
        <?php
            include '../includes/head.php';
        ?>
		<title>Admin Login</title>
	</head>
    <?php
        include '../includes/header.php';
        include 'includes/navbar.php';
    ?>
	<body>
		<section>
			<form class="form-autentification" method="POST">
				<h2>Authentification</h2>
				<input class="admin-login" type="text" name="login" placeholder="Login" required="true">
				<input class="admin-password" type="password" name="password" placeholder="Password" required="true">
				<input class="admin-submit" type="submit" value="Login">
			</form>
			<?php
				function Verif_magicquotes ($chaine) {
					$chaine = stripslashes($chaine);
					return $chaine;
				}
                if ($_POST && isset($_POST['login'])) { 
                    // Preparing a statement
                    $stmt = $bdd->prepare("SELECT * FROM identification WHERE login = ?  AND `mdp`=? ");

					$sql = 'SELECT * FROM identification WHERE login=:login AND mdp=:mdp';
					$statement = $bdd->prepare($sql);
					$statement->bindParam(':login', $_POST['login']);
					$statement->bindParam(':mdp', $_POST['password']);
					$statement->execute();
					$identification = $statement->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['log']=$identification['login'];
                    $_SESSION['mp']=$identification['mdp'];
                    if (isset($_SESSION['log'], $_SESSION['mp'])) {
                        header('Location: adminHome.php');
                        exit();
                    } else {
                        echo "Authentification incorrecte! (login ou password erroné ...)";
                    }
                }
			?>
		</section>
		<?php
			include ('../includes/footer.php');			
		?>
	</body>
</html>
