<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CartController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' 
            && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += 1;
            } else {
                $_SESSION['cart'][$productId] = [
                    'product_id' => $productId,
                    'quantity' => 1
                ];
            }
            $config = require 'config.php';
            
            $baseURL = $config['baseURL'];
           

            header('Location:'. $baseURL.'/home/index');
            exit;
        }
    }

    public function index() {
        include './App/Views/Cart/index.php';
    }
}