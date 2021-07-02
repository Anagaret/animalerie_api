<?php
namespace App\Model;

use App\Entity\User;
use Core\Database;

class UserModel {

    private $className = "App\Entity\User";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * return list of Users
     *
     * @return User[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM user";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return an User
     *
     * @param int $id
     * @return User
     */
    public function find(int $id) :user
    {
        $statement = "SELECT * FROM user WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO user (pseudo, mail, password) 
            VALUES (:pseudo, :mail, :password)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE user SET
                        pseudo = :pseudo,
                        mail = :mail,
                        password = :password
                        WHERE id = $id
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM user WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}