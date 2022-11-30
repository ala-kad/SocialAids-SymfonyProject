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

    #[ORM\ManyToMany(targetEntity: Event::class, inversedBy: 'associations')]
    private Collection $associations;


    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Administrateur::class)]
    private Collection $Adm;

    public function __construct()
    {
        $this->associations = new ArrayCollection();
        $this->prod = new ArrayCollection();
        $this->Adm = new ArrayCollection();
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
     * @return Collection<int, Event>
     */
    public function getAssociations(): Collection
    {
        return $this->associations;
    }

    public function addAssociation(Event $association): self
    {
        if (!$this->associations->contains($association)) {
            $this->associations->add($association);
        }

        return $this;
    }

    public function removeAssociation(Event $association): self
    {
        $this->associations->removeElement($association);

        return $this;
    }



    public function removeProd(Produit $prod): self
    {
        $this->prod->removeElement($prod);

        return $this;
    }

    /**
     * @return Collection<int, Administrateur>
     */
    public function getAdm(): Collection
    {
        return $this->Adm;
    }

    public function addAdm(Administrateur $adm): self
    {
        if (!$this->Adm->contains($adm)) {
            $this->Adm->add($adm);
            $adm->setAssociation($this);
        }

        return $this;
    }

    public function removeAdm(Administrateur $adm): self
    {
        if ($this->Adm->removeElement($adm)) {
            // set the owning side to null (unless already changed)
            if ($adm->getAssociation() === $this) {
                $adm->setAssociation(null);
            }
        }

        return $this;
    }
}
