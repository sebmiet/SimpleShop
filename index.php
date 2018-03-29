<meta charset="x-UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php

//connection string and signing in to database
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=SimpleShop', 'root', 'poXtRZ1Q');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET NAMES 'utf8'");
?>

<div id="content">



<?php
echo "<div id='menu'>";
showMenu();
echo "</div>";

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();

echo "<div id='products'>";
//show elements from products table
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo "<div>";
    echo "<h2>".$row['name']."</h2>";
    echo "<h3>Cena netto: ".$row['net_price']." PLN</h3>";
    echo $row['description'];
    echo "<hr/>";
    echo "</div>";
}
echo "</div>";

//show elements from table categories
function showMenu(){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['name'];
        echo "<br/>";
    }
}
?>
</div>

