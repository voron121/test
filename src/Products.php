<?php

namespace App;

use App\Registry;
use Exception;
use PDO;

class Products
{
    protected $db = null;

    public function __construct()
    {
        $this->db = Registry::get("db");
    }

    /**
     * @return Products
     */
    public function getProducts() : array
    {
        $query = "SELECT products.Id, 
                       products.Name, 
                       products.AvgPrice, 
                       products.ImageUrl, 
                       products.CreateDate, 
                       products.Author,
                       COUNT(reviews.Id) AS ReviewsCount
                FROM products
                    LEFT JOIN reviews ON reviews.productId = products.Id
                GROUP BY products.Id
                ORDER BY products.Id DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $Id
     * @return mixed
     */
    public function getProduct(int $Id)
    {
        $query = "SELECT products.Id, 
                       products.Name, 
                       products.AvgPrice, 
                       products.ImageUrl, 
                       products.CreateDate, 
                       products.Author, 
                       ROUND(AVG(reviews.Rating), 0) AS ReviewsAVG
                FROM products
                    LEFT JOIN reviews ON reviews.productId = products.Id
                WHERE products.Id = :Id
                GROUP BY products.Id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["Id" => $Id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function save()
    {
        $query = "INSERT INTO products SET Name = :Name, ImageUrl = :ImageUrl, AvgPrice = :AvgPrice, Author = :Author";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            "Name" => $this->name,
            "AvgPrice" => $this->avgPrice * 1000000,
            "ImageUrl" => $this->ImageUrl,
            "Author" => $this->author
        ]);
        return $this->db->lastInsertId();
    }
}