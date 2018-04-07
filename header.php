<meta charset="x-UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
<script src="lightbox/dist/js/lightbox.js"></script>
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>



<?php

require ('functions.php');
require ('sessions.php');
require ('request.php');
require ('user.php');
require ('cart.php');


//connection string and signing in to database
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=SimpleShop', 'root', 'poXtRZ1Q');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET NAMES 'utf8'");

$request = new userRequest();
$session = new session();
$cart = new cart();

?>
    <div id="content">
        <div id="menu">
        <?php showMenu(); ?>

        </div>
        <div id="products">

