<?php
namespace App\Controller;

use App\Model\BlogModel;
use Core\Controller\DefaultController;

class BlogController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new BlogModel;
    } 

     /**
     * List all blog messages
     * @OA\Get(
     *      path="/blog",
     *      summary="List all blog messages",
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
     *          description="List all blog messages",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Blog[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Blog"
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
     * return a blog message
     * @OA\Get(
     *      path="/blog/{id}",
     *      summary="return a blog message",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du message de blog à récupérer",
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
     *          description="return a blog message",
     *          @OA\JsonContent(ref="#/components/schemas/Blog")
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
     * Save a blog message in DB
     * 
     * @OA\Post(
     *      path="/blog/create",
     *      summary="Create a blog message",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Message de blog enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Message à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Voici un message"
     *              ),
     *              @OA\Property(
     *                  property="titre",
     *                  type="string",
     *                  example="Bonjour"
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
            $this->saveJsonResponse("Message de blog bien enregistrée");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    /**
     * Update blog in Db
     * 
     * @OA\Put(
     *      path="/blog/{id}/update",
     *      summary="Update blog",
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
     *          description="id du message de blog à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Message enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Nouvelles données du message de blog",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Voici un message"
     *              ),
     *              @OA\Property(
     *                  property="titre",
     *                  type="string",
     *                  example="Bonjour"
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

    public function update (int $id, array $data) 
    {
        $this->jsonResponse($this->model->update($id, $data));

    }

    /**
     * Delete blog in Db
     * @OA\Delete(
     *      path="/blog/{id}/delete",
     *      summary="Delete blog",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du blog à supprimer",
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
     *              example="Blog message supprimé"
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