<?php 
$host = "localhost";
$dbname = "prinneo";
$username = "root";
$password = "";
try {
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception){
    die("Connection error: " . $exception->getMessage());
}

$query = $db->prepare("SELECT * FROM product_categorys");
$query->execute();
$product_categories = $query->fetchAll();

$query = $db->prepare("SELECT * FROM product_sub_categorys");
$query->execute();
$product_sub_categories = $query->fetchAll();

$query = $db->prepare("SELECT * FROM contacts where contact_id = 1");
$query->execute();
$contact = $query->fetch();

function base_url(){
    return 'https://prinneo.com/';
} 
function site_url(){
    return 'https://prinneo.com/';
} 
 ?>