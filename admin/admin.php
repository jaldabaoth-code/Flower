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
        include 'includes/navbar.php';
    ?>
	<body>
		<section>
			<h3>Admin Panel</h3>
			<img src="../assets/images/home.jpg" alt="Page d'accueil">
		</section>
	</body>
	<?php
        include("../includes/footer.php");
    ?>
</html>
