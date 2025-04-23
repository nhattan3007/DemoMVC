<?php
require_once __DIR__ . '/../../Core/database.php';

class ProductModel {
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM product ORDER BY ProductID ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct ($productname, $price ) {
        $sql = "INSERT INTO product (ProductName, Price) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt -> execute([$productname, $price]);
    }
}
?>