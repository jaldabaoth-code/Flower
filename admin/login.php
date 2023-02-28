<!DOCTYPE html>
<html>
	<?php
		include ('../includes/conf.php');
		session_start();
		if (isset($_SESSION['login'], $_SESSION['password'])) {
			header("Location: admin.php");
			die();
		}
	?>
	<head>
        <?php
            include '../includes/head.php';
        ?>
		<link type="text/css" rel="stylesheet" href="../assets/styles/admin/login.css">
		<title>Admin Login</title>
	</head>
    <?php
        include '../includes/header.php';
        include 'includes/navbar.php';
    ?>
	<body>
		<section>
			<h2>Authentification</h2>
			<form class="form-autentification d-flex flex-column align-items-center" method="POST">
				<div class="form-group col-8 my-3">
					<input type="login" class="form-control" name="login" placeholder="Enter login" required>
				</div>
				<div class="form-group col-8 my-3">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-primary col-8 my-2" value="Login">Submit</button>
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
		</section>
		<?php
			include ('../includes/footer.php');			
		?>
	</body>
</html>
