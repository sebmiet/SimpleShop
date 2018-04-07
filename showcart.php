<?php

require('header.php');

$inCart = $cart->getProducts();
echo "<h1>Zawartość koszyka</h1>";
echo "<table class='tb-cart'>";
echo "<tr><th>INDEKS</th><th>NAZWA TOWARU</th><th>CENA NETTO</th><th>ILOŚĆ</th><th>WARTOŚĆ NETTO</th><th>USUŃ</th></tr>";
$sum = 0;
foreach ($inCart as $product) {
    $productCartId = $product['id'];
    $index = $product['index'];
    $name = $product['name'];
    $quantity = $product['quantity'];
    $net_price = $product['net_price'];
    $total = $quantity * $net_price;
    $id = $product['pid'];
    $sum += $total;

    $remLink = "<a href='remFromCart.php?id=$productCartId'>Usuń</a>";
    $plus = "<a href='addToCart.php?id=$id'>+</a>";
    $minus = '-';


    echo "<tr><td>".$index."</td>";
    echo "<td>".$name."</td>";
    echo "<td>".$net_price."</td>";
    echo "<td>$quantity $plus $minus</td>";
    echo "<td>".$net_price * $quantity."</td>";
    echo "<td>$remLink</td></tr>";
}

//var_dump($inCart);
echo "</table>";
echo "<h2>Wartość koszyka $sum zł netto</h2>";
require('footer.php');
