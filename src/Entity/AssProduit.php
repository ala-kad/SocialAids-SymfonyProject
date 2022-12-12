<?php

namespace App\Entity;

use App\Repository\AssProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssProduitRepository::class)
 */
class AssProduit

{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private ?int $qte = null;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="AssProduits")
     */

    private ?Produit $id_produit = null;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Association", inversedBy="AssProduits")
     */

    private ?Association $id_Association = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?Produit $id_produit): self
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getIdAssociation(): ?Association
    {
        return $this->id_Association;
    }

    public function setIdAssociation(?Association $id_Association): self
    {
        $this->id_Association = $id_Association;

        return $this;
    }

}
