<?php
namespace App\Entity;

use App\Repository\VolontaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolontaireRepository::class)
 */
class Volontaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

/**
 * @ORM\Column(type="integer")
  */
    private int $cin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private String $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private String $lastname;

     /**
      * @ORM\Column(type="string", length=50)
     */
    private String $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private String $password;



    public function __construct(){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
