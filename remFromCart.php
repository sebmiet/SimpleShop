<?php

require('header.php');

$cart->remove($_GET['id']);
header('Location: showcart.php');
require('footer.php');
