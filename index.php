<!DOCTYPE html>
<html>
    <?php
        include ('includes/conf.php');
        session_start();
    ?>
	<head>
        <?php
            include 'includes/head.php';
        ?>
        <title>Home</title>
	</head>
    <?php
        include 'includes/header.php';
        include 'includes/navbar.php';
    ?>
	<body>
		<section>
			<h3>"Say it with - The Flower"</h3>
            <img src="assets/images/home.jpg" alt="home image">
			<h4>You must be registered as a customer to be able to order</h4>
		</section>
	</body>
    <?php
        include 'includes/footer.php';
    ?>
</html>
