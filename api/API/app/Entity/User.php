<?php
namespace App\Entity;

class User {

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

    public $mail;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=false,
     * )
     * @var string
     */

    public $password;

    /**
     * @OA\Property(
     *      type="boolean",
     *      nullable=false,
     * )
     * @var boolean
     */
    public $admin = null;

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
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of admin
     */
    public function setAdmin($admin): self
    {
        $this->admin = $admin;

        return $this;
    }

}