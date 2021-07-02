<?php
namespace App\Controller;

use App\Model\DonModel;
use Core\Controller\DefaultController;

class DonController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new DonModel;
    }

    /**
     * List all donations
     * @OA\Get(
     *      path="/don",
     *      summary="List all donations",
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="limit permettant la pagination",
     *          required=false,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all donations",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Don[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Don"
     *              ),
     *          ),
     *          @OA\XmlContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="apiKey missing",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="internal server error",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      )
     * )
     *
     * @return void
     */

    public function list ()
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * return a donation
     * @OA\Get(
     *      path="/don/{id}",
     *      summary="return a donation",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du don à récupérer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response ="200",
     *          description="return a donation",
     *          @OA\JsonContent(ref="#/components/schemas/Don")
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="apiKey missing",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="internal server error",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      )
     * )
     *
     * @param integer $id
     * @return void
     */

    public function single ($id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    /**
     * Save donation in DB
     * 
     * @OA\Post(
     *      path="/don/create",
     *      summary="Create a donation",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Don enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Don à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="montant",
     *                  type="double",
     *                  example=50.5
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @return void
     */

    public function create ($data) 
    {
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Don bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    /**
     * Update donation in Db
     * 
     * @OA\Put(
     *      path="/don/{id}/update",
     *      summary="Update donation",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de don à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Don enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Nouvelles données du don",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="montant",
     *                  type="double",
     *                  example=40.5
     *              ),
     *          ) 
     *      )
     * )
     *
     * @param int $id
     * @param array $data
     * @return void
     */

    public function update (int $id, array $data) 
    {
        $this->jsonResponse($this->model->update($id, $data));

    }

    /**
     * Delete donation in Db
     * @OA\Delete(
     *      path="/don/{id}/delete",
     *      summary="Delete donation",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du don à supprimer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Suppression validée",
     *          @OA\JsonContent(
     *              type="string",
     *              example="Don supprimé"
     *          )
     *      )
     * )
     *
     * @param string $id
     * @return void
     */

    public function delete (string $id)
    {
        $this->jsonResponse($this->model->delete($id));
    }
}