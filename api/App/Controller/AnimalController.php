<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\DefaultController;

class AnimalController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new AnimalModel;
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
            $this->saveJsonResponse("Animal bien enregistré");
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