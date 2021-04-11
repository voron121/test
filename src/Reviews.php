<?php

namespace App;

use App\Registry;
use Exception;
use PDO;

class Reviews
{
    protected $db = null;

    public function __construct()
    {
        $this->db = Registry::get("db");
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getProductReviews(int $productId)
    {
        $query = "SELECT Id, 
                       ProductId, 
                       Name, 
                       Review, 
                       CreateDate, 
                       Rating
                FROM reviews
                WHERE ProductId = :ProductId";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["ProductId" => $productId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function save()
    {
        $query = "INSERT INTO reviews SET Name = :Name, 
                            Review = :Review, 
                            Rating = :Rating, 
                            ProductId = :ProductId";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            "Name" => $this->Name,
            "ProductId" => $this->ProductId,
            "Review" => $this->Review,
            "Rating" => $this->Rating
        ]);
        return $this->db->lastInsertId();
    }
}