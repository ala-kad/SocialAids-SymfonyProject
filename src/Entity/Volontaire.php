<?php

namespace App\Entity;

use App\Repository\VolontaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolontaireRepository::class)]

class Volontaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id;

    #[ORM\Column]
    private $cin;

    #/**
     #* @ORM\Column(type="string", length=20)
    # */
    #[ORM\Column]
    private $firstname;

    #/**
    # * @ORM\Column(type="string", length=20)
     #*/
    #[ORM\Column]
    private $lastname;

    #/**
     #* @ORM\Column(type="string", length=50)
    # */
    #[ORM\Column]
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
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
}
