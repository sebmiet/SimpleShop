<meta charset="x-UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
<script src="lightbox/dist/js/lightbox.js"></script>
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>

<?php





echo "<div id='products'>";
if (isset($_GET['cat_id'])){
    $category_id = $_GET['cat_id'];
}
else {
    $category_id = null;
}
showCategory($category_id);
echo "</div>";



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
        echo "<hr/>";
        echo "</div>";
    }
}

function getProductPictures($index){
    $images = array();

    for ($i = 0; $i < 10; $i++ ){

        $fileName =  $index."-".$i.".jpg";
        $filePath = "assets/img/$fileName";


        if (file_exists($filePath)){
            $images[] = $fileName;
        }

    }

    return $images;
}
?>

</div>
