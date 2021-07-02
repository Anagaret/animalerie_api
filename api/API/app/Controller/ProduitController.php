<?php
namespace App\Controller;

use App\Model\ProduitModel;
use Core\Controller\DefaultController;

class ProduitController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new ProduitModel;
    }

    /**
     * List all products
     * @OA\Get(
     *      path="/produit",
     *      summary="List all products",
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
     *          description="List all products",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Produit[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Produit"
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
     * return a product
     * @OA\Get(
     *      path="/produit/{id}",
     *      summary="return a produiuct",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du produit à récupérer",
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
     *          description="return a product",
     *          @OA\JsonContent(ref="#/components/schemas/Produit")
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
     * Save product in DB
     * 
     * @OA\Post(
     *      path="/produit/create",
     *      summary="Create a product",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Produit enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Produit à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Collier rouge"
     *              ),
     *              @OA\Property(
     *                  property="cible",
     *                  type="string",
     *                  example="Chiens"
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="string",
     *                  example="Accessoires"
     *              ),
     *              @OA\Property(
     *                  property="prix",
     *                  type="number",
     *                  example=5.5
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Collier rouge largeur 2 cm"
     *              ),
     *              @OA\Property(
     *                  property="image",
     *                  type="string",
     *                  example="https://www.wanimo.com/images/collier_laisse_et_harnais/A/SM/ASMS040/500x500/01/collier-basic-en-cuir-rouge-martin-sellier.jpg"
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
            $this->saveJsonResponse("Produit bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    /**
     * Update product in Db
     * 
     * @OA\Put(
     *      path="/produit/{id}/update",
     *      summary="Update product",
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
     *          description="id du produit à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Produit enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Nouvelles données du produit",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Collier rouge"
     *              ),
     *              @OA\Property(
     *                  property="cible",
     *                  type="string",
     *                  example="Chiens"
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="string",
     *                  example="Accessoire"
     *              ),
     *              @OA\Property(
     *                  property="prix",
     *                  type="double",
     *                  example=5.5
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Collier rouge largeur 2 cm"
     *              ),
     *              @OA\Property(
     *                  property="image",
     *                  type="string",
     *                  example="https://www.wanimo.com/images/collier_laisse_et_harnais/A/SM/ASMS040/500x500/01/collier-basic-en-cuir-rouge-martin-sellier.jpg"
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
     * Delete product in Db
     * @OA\Delete(
     *      path="/produit/{id}/delete",
     *      summary="Delete product",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du produit à supprimer",
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
     *              example="Produit supprimé"
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