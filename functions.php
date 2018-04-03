<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 31.03.18
 * Time: 01:40
 */

define('SESSION_COOKIE', 'cookiesklep');
define('SESSION_ID_LENGTH', 40);
define('SESSION_COOKIE_EXPIRE', 3600); //czas podtrzymania sesji

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

function random_session_id() {
    $utime = time();
    $id = random_salt(40-strlen($utime)).$utime;
    return $id;
}

function random_salt($len) {
   return random_text($len);
}

function random_text($len) {
    $base = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $max = strlen($base) - 1;
    $rstring = '';
    mt_srand((double)microtime() * 1000000);
    while (strlen($rstring) < $len)
        $rstring.= $base[mt_rand(0, $max)];
    return $rstring;
}