<?php
namespace App\Controller;

use App\Model\ProduitModel;
use Core\Controller\DefaultController;

class ProduitController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new ProduitModel;
    }

    public function list ()
    {
        $data = array();
        foreach ($this->model->findAll() as $value) {
            $value->links = [
                "categorie" => SERVER . "categorie/". $value->categorie_id,
                "user" => SERVER . "user/". $value->user_id,
                "update" => SERVER . "Produit/". $value->id ."/update",
                "delete" => SERVER . "Produit/". $value->id ."/delete"
            ];
            $data[] = $value;
        }
        $this->jsonResponse($data);
    }

    public function single (int $id)
    {
            $this->jsonResponse($this->model->find($id));
    }

    public function create ($data) 
    {
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Produit bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function update ($data) 
    {
        $this->jsonResponse($this->model->update($data));

    }

    public function delete (string $id)
    {
        $this->jsonResponse($this->model->delete($id));
    }
}