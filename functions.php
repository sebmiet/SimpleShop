<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 31.03.18
 * Time: 01:40
 */
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
?>