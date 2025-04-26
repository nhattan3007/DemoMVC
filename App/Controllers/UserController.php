<?php
require_once __DIR__ . "/../Models/ProductModel.php";
require_once __DIR__ . "/../Models/UserModel.php";

class UserController
{
    public function index()
    {
        echo "U in method Index of UserController Controler";
    }
    public function create()
    {
        echo "U in method Create of UserController Controler";
    }

    public function register()
    {
       
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }

        $error = '';
        
        $config = require './config.php';
        $baseURL = $config['baseURL'];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $userId = $userModel->createUser($username, $name, $password);
            
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;

            header("Location: " . $baseURL. 'home/index');
             exit;

        }
       include './App/Views/User/register.php';
    }
    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $error = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $pdo = new PDO("mysql:host=localhost;dbname=csdl01", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $pdo->prepare("SELECT * FROM User WHERE UserName = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$user) {
                $error = "Tên đăng nhập không tồn tại.";
            } elseif (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['username'] = $user['UserName'];
                $config = require 'config.php';
                $baseURL = $config['baseURL'];
                // Lưu URL hiện tại để chuyển hướng sau khi đăng nhập thành công
                if (isset($_SESSION['redirect_url'])) {
                    $redirectUrl = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); // Xóa URL đã lưu sau khi sử dụng
                    header("Location: " . $redirectUrl);
                    exit;
                }   
                header("Location: " . $baseURL . 'home/index');
                exit;
            } else {
                $error = "Mật khẩu không đúng.";
            }
        }
    
        include './App/Views/User/login.php';
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset(  $_SESSION['user_id']);
        unset(  $_SESSION['username']);
        $config = require 'config.php';
        
        $baseURL = $config['baseURL'];
        header("Location: " . $baseURL.'home/index'); // về trang chủ
        exit;
     
    }

    public function contact()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $config = require 'config.php';
        $baseURL = $config['baseURL'];
        include './App/Views/User/contact.php';
    }
}
