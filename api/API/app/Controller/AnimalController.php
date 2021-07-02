<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\DefaultController;

class AnimalController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new AnimalModel;
    }

    /**
     * List all animals
     * @OA\Get(
     *      path="/animal",
     *      summary="List all animals",
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
     *          description="List all animals",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Animal[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Animal"
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
     * return an animal
     * @OA\Get(
     *      path="/animal/{id}",
     *      summary="return an animal",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'animal à récupérer",
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
     *          description="return an animal",
     *          @OA\JsonContent(ref="#/components/schemas/Animal")
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

    public function single (int $id)
    {
            $this->jsonResponse($this->model->find($id));
    }


    /**
     * Save animal in DB
     * 
     * @OA\Post(
     *      path="/animal/create",
     *      summary="Create an animal",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Animal enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Animal à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Charlie"
     *              ),
     *              @OA\Property(
     *                  property="espece",
     *                  type="string",
     *                  example="Chiens"
     *              ),
     *              @OA\Property(
     *                  property="couleur",
     *                  type="string",
     *                  example="Blanc et marron"
     *              ),
     *              @OA\Property(
     *                  property="race",
     *                  type="string",
     *                  example="Welsh Corgi Pembroke"
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  type="integer",
     *                  example=2
     *              ),
     *              @OA\Property(
     *                  property="taille",
     *                  type="double",
     *                  example=0.5
     *              ),
     *              @OA\Property(
     *                  property="poids",
     *                  type="double",
     *                  example=10
     *              ),
     *              @OA\Property(
     *                  property="sexe",
     *                  type="bit",
     *                  example=0
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Très joueur"
     *              ),
     *              @OA\Property(
     *                  property="image",
     *                  type="string",
     *                  example="https://www.centrale-canine.fr/sites/default/files/2019-02/Big%20Woods%20Thomas%20O%27Malley%20%28Johana%20Flink%29.jpg"
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
            $this->saveJsonResponse("Animal bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    /**
     * Update animal in Db
     * 
     * @OA\Put(
     *      path="/animal/{id}/update",
     *      summary="Update animal",
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
     *          description="id de l'animal à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Animal enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Nouvelles données de l'animal",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Charlie"
     *              ),
     *              @OA\Property(
     *                  property="espece",
     *                  type="string",
     *                  example="Chiens"
     *              ),
     *              @OA\Property(
     *                  property="couleur",
     *                  type="string",
     *                  example="Blanc et marron"
     *              ),
     *              @OA\Property(
     *                  property="race",
     *                  type="string",
     *                  example="Welsh Corgi Pembroke"
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  type="integer",
     *                  example=2
     *              ),
     *              @OA\Property(
     *                  property="taille",
     *                  type="double",
     *                  example=0.5
     *              ),
     *              @OA\Property(
     *                  property="poids",
     *                  type="double",
     *                  example=12
     *              ),
     *              @OA\Property(
     *                  property="sexe",
     *                  type="bit",
     *                  example=0
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Très joueur"
     *              ),
     *              @OA\Property(
     *                  property="image",
     *                  type="string",
     *                  example="https://www.centrale-canine.fr/sites/default/files/2019-02/Big%20Woods%20Thomas%20O%27Malley%20%28Johana%20Flink%29.jpg"
     *              ),
     *          )
     *              
     *      )
     * )
     *
     * @param int $id
     * @param array $data
     * @return void
     */

    public function update ($id, $data) 
    {
        $this->jsonResponse($this->model->update($id, $data));

    }

     /**
     * Delete animal in Db
     * @OA\Delete(
     *      path="/animal/{id}/delete",
     *      summary="Delete animal",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'animal à supprimer",
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
     *              example="Animal supprimé"
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