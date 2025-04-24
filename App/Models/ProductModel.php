<?php
require_once __DIR__ . '/../../Core/database.php';

class ProductModel {
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllProducts() {
        $sql = "SELECT ProductID ,ProductName, Price, Image FROM product ORDER BY ProductID ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(); // Execute the query
        // $stmt = $this->db->prepare("SELECT * FROM product ORDER BY ProductID ASC");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct ($productname, $price ) {
        $sql = "INSERT INTO product (ProductName, Price) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt -> execute([$productname, $price]);
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM product WHERE ProductID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>