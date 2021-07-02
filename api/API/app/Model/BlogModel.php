<?php
namespace App\Model;

use Core\Database;
use App\Entity\Blog;

class BlogModel {

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
     * Return an Blog
     *
     * @param int $id
     * @return Blog
     */
    public function find(int $id) :Blog
    {
        $statement = "SELECT * FROM blog WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO blog (pseudo, titre, message) 
            VALUES (:pseudo, :titre,  :message)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE blog SET 
            pseudo = :pseudo ,
            titre = :titre, 
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