<?php
namespace App\Entity;

class Blog {

    /**
     * @OA\Property(
     *      type="integer",
     *      nullable=false,
     * )
     * @var int
     */

    public $id;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $pseudo;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $titre;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $date;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */
    
    public $message;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre($titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }
    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }

}