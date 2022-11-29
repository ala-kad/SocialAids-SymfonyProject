<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ident = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;


    private ?int $tel = null;

    #[ORM\ManyToOne(inversedBy: 'administrateurs')]
    private ?Compte $comptes = null;

    #[ORM\ManyToOne(inversedBy: 'Adm')]
    private ?Association $association = null;

    #[ORM\ManyToOne(inversedBy: 'Ad')]
    private ?Volontaire $volontaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdent(): ?int
    {
        return $this->ident;
    }

    public function setIdent(int $ident): self
    {
        $this->ident = $ident;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getComptes(): ?Compte
    {
        return $this->comptes;
    }

    public function setComptes(?Compte $comptes): self
    {
        $this->comptes = $comptes;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): self
    {
        $this->association = $association;

        return $this;
    }

    public function getVolontaire(): ?Volontaire
    {
        return $this->volontaire;
    }

    public function setVolontaire(?Volontaire $volontaire): self
    {
        $this->volontaire = $volontaire;

        return $this;
    }
}
