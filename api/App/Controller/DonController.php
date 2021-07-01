<?php
namespace App\Controller;

use App\Model\DonModel;
use Core\Controller\DefaultController;

class DonController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new DonModel;
    }

    public function list ()
    {
        $this->jsonResponse($this->model->findAll());
    }

    public function single ($id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function create ($data) 
    {
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Don bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function update (int $id, array $data) 
    {
        $this->jsonResponse($this->model->update($id, $data));

    }

    public function delete (string $id)
    {
        $this->jsonResponse($this->model->delete($id));
    }
}