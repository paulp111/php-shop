<?php

class Product
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $price, $image_url)
    {
        $sql = "INSERT INTO products (name, description, price, image_url) VALUES (:name, :description, :price, :image_url)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image_url' => $image_url
        ]);
    }

    public function updateProduct($id, $name, $description, $price, $image_url)
    {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, image_url = :image_url WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image_url' => $image_url,
            ':id' => $id
        ]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function getTopSellingProducts()
    {
        $sql = "SELECT products.id, products.name, products.image_url, SUM(carts.quantity) AS total_sold
                FROM products
                JOIN carts ON products.id = carts.product_id
                GROUP BY products.id, products.name, products.image_url
                ORDER BY total_sold DESC
                LIMIT 10";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
