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
		<title>Accueil Société Lafleur</title>
	</head>
	<body>
		<header>
			<?php
				include("../includes/header.php");
			?>
		</header>
		<nav>
			<?php
				include("../includes/nav.php");
			?>   
		</nav>
		<section>
			<h3>"Dites-le avec Lafleur"</h3>
			<p>
				<img src="images/accueil.jpg" alt="Page d'accueil" />
			</p>
			<h4>Pour recevoir un bon de commande</br>Appelez notre service commercial au 03.22.84.65.74</h4>
		</section>
		<footer>
			<?php
				include("../include./footer.php");
				$i=0;
				if(!empty($_SESSION['fleurChoi'])) {
					$test[$i] = $_SESSION['fleurChoi'];
					echo $test[$i];
					$i++;
				}
			?> 
		</footer>
	</body>
</html>
