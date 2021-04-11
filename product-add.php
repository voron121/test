<?php
use App\Products;
require_once __DIR__ . "/init.php";

try {
    $products = new Products();

    if (!empty($_POST)) {
        $products->name = isset($_POST["name"]) ? $_POST["name"] : null;
        $products->avgPrice = isset($_POST["avgPrice"]) ? $_POST["avgPrice"] : null;
        $products->ImageUrl = isset($_POST["ImageUrl"]) ? $_POST["ImageUrl"] : null;
        $products->author = isset($_POST["author"]) ? $_POST["author"] : null;
        $productId = $products->save();
    }
    Template::renderTemplate("products/product-add");
} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>
