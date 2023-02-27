<!DOCTYPE html>
<html>
	<?php
		include ('../includes/conf.php');
		session_start();
		if(isset($_SESSION['log'], $_SESSION['mp'])) {
			header("Location: admin.php");
			die();
		}
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
				<input class="admin-login" type="text" name="login" placeholder="Login" required>
				<input class="admin-password" type="password" name="password" placeholder="Password" required>
				<input class="admin-submit" type="submit" value="Login">
			</form>
			<?php
                if ($_POST && isset($_POST['login'])) { 
					$statement = $bdd->prepare('SELECT * FROM identification WHERE login=:login AND mdp=:mdp');
					$statement->bindParam(':login', $_POST['login']);
					$statement->bindParam(':mdp', $_POST['password']);
					$statement->execute();
					$identification = $statement->fetch(PDO::FETCH_ASSOC);
                    if (isset($identification['login'], $identification['mdp'])) {
						$_SESSION['log']=$identification['login'];
						$_SESSION['mp']=$identification['mdp'];
                        header('Location: admin.php');
                        exit();
                    } else {
                        echo "Incorrect authentication! (Wrong login or password)";
                    }
                }
			?>
		</section>
		<?php
			include ('../includes/footer.php');			
		?>
	</body>
</html>
