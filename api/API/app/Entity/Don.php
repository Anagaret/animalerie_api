<?php
namespace App\Entity;

class Don {

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
     *      type="number",
     *      nullable=false,
     * )
     * @var double
     */

    public $montant;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $date;

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
     * Get the value of montant
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     */
    public function setMontant($montant): self
    {
        $this->montant = $montant;

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

}