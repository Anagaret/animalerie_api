<?php
namespace App\Model;

use Core\Database;
use App\Entity\Animal;

class AnimalModel {

    private $className = "App\Entity\Animal";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * return list of Animaux
     *
     * @return Animal[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM animaux";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return an Animal
     *
     * @param int $id
     * @return Animal
     */
    public function find(int $id) :Animal
    {
        $statement = "SELECT * FROM animaux WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO animaux (nom, espece, race, age, poids, taille, image, description, couleur, sexe, sterile) 
            VALUES (:nom, :espece, :race, :age, :poids, :taille, :image, :description, :couleur, :sexe, :sterile)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE animaux SET 
            name = :name ,
            nom = :nom, 
            espece = :espece, 
            race = :race, 
            age = :age, 
            poids = :poids, 
            taille = :taille, 
            image = :image, 
            description = :description, 
            couleur = :couleur,
            sexe = :sexe, 
            sterile = :sterile
            WHERE id = $id";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM animaux WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}