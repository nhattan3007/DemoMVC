<?php

require_once __DIR__ . "/../Models/ProductModel.php";

class HomeController {
    public function index() {

        // Gọi Model để lấy danh sách sản phẩm
        $product = new ProductModel();
        $productList = $product->getAllProducts();
        include __DIR__ . "/../Views/Home/index.php";
    }
}

?>