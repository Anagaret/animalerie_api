<?php
namespace App\Model;

use Core\Database;
use App\Entity\Don;

class DonModel {

    private $className = "App\Entity\Don";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * return list of dons
     *
     * @return Don[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM dons";
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
        $statement = "SELECT * FROM dons WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO dons (pseudo, montant) 
            VALUES (:pseudo, :montant)";
        return $this->db->prepare($statement, $data);
    }

    public function update(int $id, array $data)
    {
        $statement = "UPDATE dons SET 
            pseudo = :pseudo ,
            montant = :montant
            WHERE id = $id";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM dons WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}