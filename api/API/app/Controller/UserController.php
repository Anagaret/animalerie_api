<?php
namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\DefaultController;
use Firebase\JWT\JWT;

class UserController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new UserModel;
    }

    /**
     * List all users
     * @OA\Get(
     *      path="/user",
     *      summary="List all users",
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
     *          description="List all users",
     *          @OA\JsonContent(
     *              type="array",
     *              description="User[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/User"
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
     * return an user
     * @OA\Get(
     *      path="/user/{id}",
     *      summary="return an user",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du user à récupérer",
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
     *          description="return an user",
     *          @OA\JsonContent(ref="#/components/schemas/User")
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
     * Save user in DB
     * 
     * @OA\Post(
     *      path="/user/create",
     *      summary="Create a user",
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="User enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="User à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="mail",
     *                  type="string",
     *                  example="test@test.fr"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="password"
     *              ),
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="string",
     *                  example="monPseudo"
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
            $this->saveJsonResponse("User bien enregistrée");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    /**
     * Update user in Db
     * 
     * @OA\Put(
     *      path="/user/{id}/update",
     *      summary="Update user",
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
     *          description="id de user à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="User enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Nouvelles données du user",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="mail",
     *                  type="string",
     *                  example="test@test.fr"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="password"
     *              ),
     *              @OA\Property(
     *                  property="pseudo",
     *                  type="string",
     *                  example="monPseudo"
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
     * Delete user in Db
     * @OA\Delete(
     *      path="/user/{id}/delete",
     *      summary="Delete user",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du user à supprimer",
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
     *              example="User supprimé"
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
    public function login (array $currentUser)
    {
        $user = $this->model->getUserByEmail($currentUser["email"]);
        if (password_verify($currentUser["password"], $user->getPassword())) {
            $date = new \DateTime();
            $date->add(new \DateInterval('P1D'));
            $ts = $date->getTimestamp();
            $key = "toto";
            $payload = [
                "id" => $user->getId(),
                "email" => $user->getEmail(),
                "pseudo" => $user->getPseudo(),
                "roles" => $user->getRole(),
                "exp" => $ts
            ];
            $jwt = JWT::encode($payload, $key);
            $this->jsonResponse($jwt);
        } else {
            $this->unauthorizedResponse("Erreur identifiants");
        }
    }
} 