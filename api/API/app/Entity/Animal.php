<?php
namespace App\Entity;

class Animal {

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
     *      nullable=false
     * )
     * @var string
     */

    public $nom;
    
     /**
     * @OA\Property(
     *      type="string",
     *      nullable=false
     * )
     * @var string
     */

    public $espece;
    
     /**
     * @OA\Property(
     *      type="string",
     *      nullable=false
     * )
     * @var string
     */

    public $race;
    
     /**
     * @OA\Property(
     *      type="integer",
     *      nullable=false
     * )
     * @var int
     */

    public $age;
    
     /**
     * @OA\Property(
     *      type="number",
     *      nullable=false
     * )
     * @var number
     */

    public $poids;
    
     /**
     * @OA\Property(
     *      type="number",
     *      nullable=false
     * )
     * @var number
     */

    public $taille;
    
     /**
     * @OA\Property(
     *      type="string",
     *      nullable=false
     * )
     * @var string
     */

    public $image;
    
     /**
     * @OA\Property(
     *      type="string",
     *      nullable=false
     * )
     * @var string
     */

    public $description;
    
     /**
     * @OA\Property(
     *      type="string",
     *      nullable=false
     * )
     * @var string
     */

    public $couleur;
    
     /**
     * @OA\Property(
     *      type="boolean",
     *      nullable=false
     * )
     * @var boolean
     */

    public $adopted ;
    
     /**
     * @OA\Property(
     *      type="date",
     *      nullable=false
     * )
     * @var date
     */

    public $adoptionDate ;
    
     /**
     * @OA\Property(
     *      type="boolean",
     *      nullable=true
     * )
     * @var boolean
     */

    public $sexe;
    
     /**
     * @OA\Property(
     *      type="boolean",
     *      nullable=false
     * )
     * @var boolean
     */

    public $sterile;
    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

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
     * Get the value of espece
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set the value of espece
     */
    public function setEspece($espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get the value of race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     */
    public function setRace($race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     */
    public function setAge($age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of poids
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set the value of poids
     */
    public function setPoids($poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get the value of taille
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set the value of taille
     */
    public function setTaille($taille): self
    {
        $this->taille = $taille;

        return $this;
    }
    /**
     * Get the value of couleur
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     */
    public function setCouleur($couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }
    /**
     * Get the value of adopted
     */
    public function getIsAdopted()
    {
        return $this->adopted;
    }

    /**
     * Set the value of is_adopted
     */
    public function setIsAdopted($adopted): self
    {
        $this->adopted = $adopted;

        return $this;
    }
    /**
     * Get the value of adoptionDate
     */
    public function getAdoptionDate()
    {
        return $this->adoptionDate;
    }

    /**
     * Set the value of adoptionDate
     */
    public function setAdoptionDate($adoptionDate): self
    {
        $this->adoptionDate = $adoptionDate;

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
     * Get the value of sexe
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     */
    public function setSexe($sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
    /**
     * Get the value of sterile
     */
    public function getSterile()
    {
        return $this->sterile;
    }

    /**
     * Set the value of sterile
     */
    public function setSterile($sterile): self
    {
        $this->sterile = $sterile;

        return $this;
    }
}