<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: AssociationRepository::class)]

class Association
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $local = null;

    #[ORM\Column(length: 255)]
    private ?string $objectif = null;

    #[ORM\OneToMany(mappedBy: 'AsPro', targetEntity: AssProduit::class)]
    private Collection $assProduits;

    #[ORM\OneToMany(mappedBy: 'id_Association', targetEntity: AssProduit::class)]
    private Collection $AssProduits;





    public function __construct()
    {
        $this->assProduits = new ArrayCollection();
        $this->AssProduits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLocal(): ?string
    {
        return $this->local;
    }

    public function setLocal(string $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * @return Collection<int, AssProduit>
     */
    public function getAssProduits(): Collection
    {
        return $this->assProduits;
    }

    public function addAssProduit(AssProduit $assProduit): self
    {
        if (!$this->assProduits->contains($assProduit)) {
            $this->assProduits->add($assProduit);
            $assProduit->setAsPro($this);
        }

        return $this;
    }

    public function removeAssProduit(AssProduit $assProduit): self
    {
        if ($this->assProduits->removeElement($assProduit)) {
            // set the owning side to null (unless already changed)
            if ($assProduit->getAsPro() === $this) {
                $assProduit->setAsPro(null);
            }
        }

        return $this;
    }}
