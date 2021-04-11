<?php
use App\Products;
use App\Reviews;

require_once __DIR__ . "/init.php";
try {
    $products = new Products();
    $reviews = new Reviews();

    $product = $products->getProduct($_GET["product-id"]);
    $productReviews = $reviews->getProductReviews($_GET["product-id"]);

    if (!empty($_POST)) {
        $reviews->ProductId = isset($_POST["productid"]) ? (int)$_POST["productid"] : null;
        $reviews->Name = isset($_POST["name"]) ? $_POST["name"] : null;
        $reviews->Review = isset($_POST["review"]) ? $_POST["review"] : null;
        $reviews->Rating = isset($_POST["rating"]) ? $_POST["rating"] : 1;
        $reviews = $reviews->save();
    }

    Template::renderTemplate("reviews/product-review", ["product" => $product, "reviews" => $productReviews]);
} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>
