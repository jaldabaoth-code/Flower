<?php
    // Call to database
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=lafleurv2', 'mysql_zura', 'jj46najj46na');
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    function basketCreation() {
       /*  if (isset($_GET)) { */
            $_SESSION["basket"]["reference"] = $_GET['reference'];
            $_SESSION["basket"]["name"] = $_GET['name'];
            $_SESSION["basket"]["quantity"] = $_GET['quantity'];
            $_SESSION["basket"]["unitPrice"] = $_GET['unitPrice'];
            $_SESSION["basket"]["lock"] = false;
   /*      } */
    }	

/*     function addItem($reference, $quantity) {

    if (basketCreation() && !isLocked()) {
        // If the product already exists, only add the quantity
        $productPosition = array_search($reference, $_SESSION['basket']['reference']);
        if ($productPosition !== false) {
            $_SESSION["basket"]["quantity"][$productPosition] += $quantity;
        } else {
            // Otherwise we add the product
            array_push( $_SESSION['basket']['reference'], $reference);
            array_push( $_SESSION['basket']['quantity'], $quantity);
        }
    } else
        echo "A problem occurred please contact the site administrator";
    }  */              
?>
