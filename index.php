<!DOCTYPE html>
<html>
    <?php
        include ('includes/conf.php');
        session_start();
    ?>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Company - The Flower</title>
        <link type="text/css" rel="stylesheet" href="assets/styles/style.css"/>
	</head>
	<body>
        <?php
            include 'includes/header.php';
            include 'includes/navbar.php';
        ?>
		<section>
			<h3>"Say it with - The Flower"</h3>
            <img src="assets/images/home.jpg" alt="home image" />
			<h4>You must be registered as a customer to be able to order</h4>
            <form method=GET action=http://www.google.com/custom> 
                <input TYPE=text name=q size=15 maxlength=255 value=""><br>
                <input type=submit name=sa VALUE="Rechercher"> 
                <input type=hidden name=domains value="http://localhost/lafleurv3/accueil.php"><br>
                <input type=radio name=sitesearch value="">Sur le web<br> 
                <input type=radio name=sitesearch value="http://localhost/lafleurv3/accueil.php" checked>Here
            </form>
		</section>
		<footer id ="bas">
			<h2>Copyrights Your name made on ...</h2>
		</footer>
	</body>
</html>
