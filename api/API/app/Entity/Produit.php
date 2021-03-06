<?php namespace App\Entity;

class Produit {

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

    public $nom;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */
    
    public $type;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $cible;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $description;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $image;

    /**
     * @OA\Property(
     *      type="number",
     *      nullable=false,
     * )
     * @var double
     */

    public $prix;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of article
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of article
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of cible
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * Set the value of cible
     */
    public function setCible($cible): self
    {
        $this->cible = $cible;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}