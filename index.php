<?php
use App\Products;

require_once __DIR__ . "/init.php";

$products = new Products();
$productsList = $products->getProducts();

Template::renderTemplate("products/products-list", ["productsList" => $productsList]);
?>