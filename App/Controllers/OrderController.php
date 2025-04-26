<?php

class OrderController
{
    public function checkout()
    {
        if (session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
        $config = require 'config.php';            
        $baseURL = $config['baseURL'];           

        // 1. Neu nguoi dung chua login ==>yeu cau login 
        if (!isset($_SESSION['user_id'])) {   
            $_SESSION['redirect_url'] = $baseURL . 'order/checkout'; // Lưu URL hiện tại
            header('Location:'. $baseURL . 'user/login');
            exit();
        }
        // 2. Tạo Order
        // 3. Tạo Order Detail 
        // 4. Xoa gio hang
        include __DIR__ . '/../Views/Order/checkout.php';
    }
}
?>