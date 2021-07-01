<?php
namespace App\Controller;

use App\Model\BlogModel;
use Core\Controller\DefaultController;

class BlogController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new BlogModel;
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
            $this->saveJsonResponse("Message de blog bien enregistrée");
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