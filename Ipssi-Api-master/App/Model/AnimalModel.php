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
        $statement = "SELECT * FROM Animal";
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
        $statement = "SELECT * FROM Animal WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO Animal (name) 
            VALUES (:name)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE Animal SET name = :name WHERE id = $id";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM Animal WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}