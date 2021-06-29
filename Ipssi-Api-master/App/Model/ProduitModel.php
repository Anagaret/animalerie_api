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
        $statement = "SELECT * FROM produits";
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
        $statement = "SELECT * FROM produits WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO nom (title, type, cible, description, image, prix) 
            VALUES (:nom, :type, :cible, :description, :image, :prix)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE produits SET
                        nom = :nom,
                        type = :type,
                        cible = :cible,
                        description = :description,
                        image = :image
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM produits WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}