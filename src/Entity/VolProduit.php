<?php

namespace App\Entity;

use App\Repository\VolProduitRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=VolProduitRepository::class)
 */
class VolProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="float", length=10)
     */
    private ?float $montant = null;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volontaire", inversedBy="VolProduits")
     */

    private ?Volontaire $id_Vol = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="VolProd")
     */

    private ?Produit $id_prod = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }


    public function getIdVol(): ?Volontaire
    {
        return $this->id_Vol;
    }

    public function setIdVol(?Volontaire $id_Vol): self
    {
        $this->id_Vol = $id_Vol;

        return $this;
    }

    public function getIdProd(): ?Produit
    {
        return $this->id_prod;
    }

    public function setIdProd(?Produit $id_prod): self
    {
        $this->id_prod = $id_prod;

        return $this;
    }

}
