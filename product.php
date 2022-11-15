<?php
include_once './config/database.php';
include_once './views/tableRow.php';

function deleteProduct($connection, $id) {    
    // cau lenh xoa 
    $sqlDelete = "DELETE FROM products WHERE id = {$id}";
    $stmt = $connection->prepare($sqlDelete);
    $stmt->execute();
    return $stmt;
}


function getProductsByPrice($connection, $price) {
    // cau lenh lay du lieu cua bang
    $sqlSelect = "SELECT * FROM products WHERE price > {$price}";
    $stmt = $connection->prepare($sqlSelect);
    $stmt->execute();
    return $stmt;
}


// đối tượng $DbConnection đã được instance trong file ./config/Database.php
// $productTable = getAllProducts($DbConnection);

$productTable = getProductsByPrice($DbConnection, 100);


// set the resulting array to associative
$data = $productTable->setFetchMode(PDO::FETCH_ASSOC);

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>name</th><th>description</th><th>price</th><th>category</th></tr>";
   foreach(new TableRows(new RecursiveArrayIterator($productTable->fetchAll())) as $k=>$v) {
       echo $v;
   }
echo "</table>";