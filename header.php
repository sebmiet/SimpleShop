<meta charset="x-UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
<script src="lightbox/dist/js/lightbox.js"></script>
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>

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




//show elements from table categories
function showMenu(){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();

    echo "<a href='index.php'>Wszystkie kategorie</a>\n";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $id = $row['id'];
        echo "<a href='index.php?cat_id=$id'>$name</a>";
        echo "<br/>";
    }
}