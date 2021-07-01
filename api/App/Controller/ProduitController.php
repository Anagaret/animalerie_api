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
        
        $this->jsonResponse($this->model->findAll());
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

    public function update ($id, $data) 
    {
        $this->jsonResponse($this->model->update($id, $data));

    }

    public function delete (string $id)
    {
        $this->jsonResponse($this->model->delete($id));
    }
}