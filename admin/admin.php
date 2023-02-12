<!DOCTYPE html>
<?php
	include ('../includes/conf.php');
	session_start();
  	if (empty($_SESSION['log'])) {
    	header("Location: login.php");
    	die();
  	}
?>
<html>
	<head>
        <?php
            include '../includes/head.php';
        ?>
		<title>Admin Home</title>
	</head>
    <?php
        include '../includes/header.php';
        include '../includes/navbar.php';
    ?>
	<body>
		<section>
			<h3>Admin Panel</h3>
			<img src="images/accueil.jpg" alt="Page d'accueil">
		</section>
		<footer>
			<?php
				include("../include./footer.php");
				$i=0;
				if (!empty($_SESSION['fleurChoi'])) {
					$test[$i] = $_SESSION['fleurChoi'];
					echo $test[$i];
					$i++;
				}
			?> 
		</footer>
	</body>
</html>
