<?php

require('header.php');

$cart->add($_GET['id']);
header('Location: showcart.php');

require('footer.php');
