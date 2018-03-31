<meta charset="x-UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
<script src="lightbox/dist/js/lightbox.js"></script>
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>

<?php

require('header.php');


if (isset($_GET['cat_id'])){
    $category_id = $_GET['cat_id'];
}
else {
    $category_id = null;
}
showCategory($category_id);

require('footer.php');

//show elements from products table
function showCategory($category_id = null){
    global $pdo;

    if($category_id) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = :cid");
        $stmt->bindValue(':cid', $category_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    else {
        $stmt = $pdo->prepare("SELECT * FROM products");
        $stmt->execute();
    }
    echo "<table class='product'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>";
        $index = $row['index'];
        $id =  $row['id'];

        //photo
        $images = getProductPictures($index);
        if (!empty($images)) {
            $image = $images[0];
        }
        else {
            $image = 'no-photo.jpg';
        }

        echo "<img src='assets/img/mini/$image'/>";
        echo "</td><td>";

        //product name
        echo "<a href='product.php?product_id=$id'>";
        echo $row['name'];
        echo "</a>";
        echo "</td><td>";

        //net price
        echo $row['net_price']." PLN netto";
        echo "</td></tr>";
    }
    echo "</table>";
}


?>


