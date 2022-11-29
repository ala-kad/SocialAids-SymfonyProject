<?php

namespace App\Entity;

use App\Repository\ReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementRepository::class)]
class Reglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $code_reg = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\ManyToOne(inversedBy: 'reg')]
    private ?Volontaire $volontaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeReg(): ?string
    {
        return $this->code_reg;
    }

    public function setCodeReg(string $code_reg): self
    {
        $this->code_reg = $code_reg;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

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
