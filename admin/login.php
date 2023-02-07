<!DOCTYPE html>
<html>
	<?php
		include ('../includes/conf.php');
		session_start();
	?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../assets/styles/style.css"/>
		<title>Admin Login</title>
	</head>
	<?php
		include("../includes/header.php");
	?>
	<body>
		<section>
			<form method="POST">
				<table>
					<tr>
						<th colspan='2'>Authentification</th>
					</tr>
					<tr>
						<td>Login : <input type="text" id="login" name="login"></td>
						<td>Password : <input type="password" id="mdp" name="mdp"></td>
					</tr>
					<tr>					
						<td colspan='2'><input type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
			<?php
				function Verif_magicquotes ($chaine) {
					$chaine = stripslashes($chaine);
					return $chaine;
				}
                if ($_POST && isset($_POST['login'])) { 
                    // Preparing a statement
                    $stmt = $db->prepare("SELECT * FROM identification WHERE login = ?  AND `mdp`=? ");
                    // Execute/run the statement. 
                    $stmt->execute(array($_POST['login'], $_POST['mdp']));
                    // Fetch the result. 
                    $identification = $stmt->fetch(); 
                    var_dump($identification); 
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
