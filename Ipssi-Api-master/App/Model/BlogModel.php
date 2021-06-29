<?php
namespace App\Model;

use Core\Database;
use App\Entity\Blog;

class AnimalModel {

    private $className = "App\Entity\Blog";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * return list of blog messages
     *
     * @return Blog[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM blog";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return an don
     *
     * @param int $id
     * @return Don
     */
    public function find(int $id) :Don
    {
        $statement = "SELECT * FROM blog WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO blog (pseudo, titre, date,message) 
            VALUES (:pseudo, :titre, :date, :message)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE dons SET 
            pseudo = :pseudo ,
            titre = :titre, 
            date = :date,
            message = :message
            WHERE id = $id";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM blog WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}