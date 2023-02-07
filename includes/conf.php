<?php
    // Call to database
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=lafleurv2', '', '');
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    function basketCreation() {
        if (!isset($_SESSION["basket"])) {
            $_SESSION["basket"] = array();
            $_SESSION["basket"]["reference"] = array();
            $_SESSION["basket"]["quantity"] = array();
            $_SESSION["basket"]["lock"] = false;
        }
    }	

    function addItem($reference, $quantity) {

    if (basketCreation() && !isLocked()) {
        // If the product already exists, only add the quantity
        $productPosition = array_search($reference, $_SESSION['basket']['reference']);
        if ($productPosition !== false) {
            $_SESSION["basket"]["quantity"][$productPosition] += $quantity;
        } else {
            // Otherwise we add the product
            array_push( $_SESSION['panier']['reference'], $reference);
            array_push( $_SESSION['panier']['quantite'], $quantity);
        }
    } else
        echo "A problem occurred please contact the site administrator";
    }               
?>
