<?php

require('header.php');

$id = $_GET['product_id'];
if (isset($id)) {
    showProduct($id);
}

function showProduct($id) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<div>";
        echo "<h2>".$row['name']."</h2>";
        echo "<h3>Cena netto: ".$row['net_price']." PLN</h3>";

        $index = $row['index'];

        foreach (getProductPictures($index) as $image) {
            echo "<a href=\"assets/img/$image\" data-lightbox=\". $index .\">";
            echo "<img src='assets/img/thumbs/$image'/>";
            echo "</a><br/>";
        }

        echo $row['description'];
        echo "<br><br>";
        echo "<a href=\"addToCart.php?id=$id\">Dodaj do koszyka</a>";


        echo "<hr/>";
        echo "</div>";
    }
}


require('footer.php');