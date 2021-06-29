<?php
namespace App\Model;

use App\Entity\Produit;
use Core\Database;

class ProduitModel {

    private $className = "App\Entity\Produit";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * return list of Produits
     *
     * @return Produit[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM produit";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return an Produit
     *
     * @param int $id
     * @return Produit
     */
    public function find(int $id) :Produit
    {
        $statement = "SELECT * FROM Produit WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO Produit (title, content, categorie_id, user_id) 
            VALUES (:title, :content, :categorie_id, :user_id)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE Produit SET
                        title = :title,
                        content = :content,
                        categorie_id = :categorie_id,
                        user_id = :user_id
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM Produit WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}