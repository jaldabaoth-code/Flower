<?php
    // Call to database
    try {
        $dataBase = new PDO('mysql:host=localhost;dbname=flower', 'mysql_zura', 'jj46najj46na');
    } catch(Exception $e) {
        die('Error : ' . $e->getMessage());
    }
?>