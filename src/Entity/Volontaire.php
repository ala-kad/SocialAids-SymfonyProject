<?php

namespace App\Entity;

use App\Repository\VolontaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[ORM\OneToMany(mappedBy: 'volontaire', targetEntity: Reglement::class)]
    private Collection $reg;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'volontaires')]
    private Collection $prod;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Compte $comp = null;

    #[ORM\ManyToMany(targetEntity: Event::class, inversedBy: 'volontaires')]
    private Collection $ev;

    #[ORM\OneToMany(mappedBy: 'volontaire', targetEntity: Administrateur::class)]
    private Collection $Ad;

    public function __construct()
    {
        $this->reg = new ArrayCollection();
        $this->prod = new ArrayCollection();
        $this->ev = new ArrayCollection();
        $this->Ad = new ArrayCollection();
    }

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
    /**
     * @return Collection<int, Reglement>
     */
    public function getReg(): Collection
    {
        return $this->reg;
    }

    public function addReg(Reglement $reg): self
    {
        if (!$this->reg->contains($reg)) {
            $this->reg->add($reg);
            $reg->setVolontaire($this);
        }

        return $this;
    }

    public function removeReg(Reglement $reg): self
    {
        if ($this->reg->removeElement($reg)) {
            // set the owning side to null (unless already changed)
            if ($reg->getVolontaire() === $this) {
                $reg->setVolontaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProd(): Collection
    {
        return $this->prod;
    }

    public function addProd(Produit $prod): self
    {
        if (!$this->prod->contains($prod)) {
            $this->prod->add($prod);
        }

        return $this;
    }

    public function removeProd(Produit $prod): self
    {
        $this->prod->removeElement($prod);

        return $this;
    }

    public function getComp(): ?Compte
    {
        return $this->comp;
    }

    public function setComp(?Compte $comp): self
    {
        $this->comp = $comp;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEv(): Collection
    {
        return $this->ev;
    }

    public function addEv(Event $ev): self
    {
        if (!$this->ev->contains($ev)) {
            $this->ev->add($ev);
        }

        return $this;
    }

    public function removeEv(Event $ev): self
    {
        $this->ev->removeElement($ev);

        return $this;
    }

    /**
     * @return Collection<int, Administrateur>
     */
    public function getAd(): Collection
    {
        return $this->Ad;
    }

    public function addAd(Administrateur $ad): self
    {
        if (!$this->Ad->contains($ad)) {
            $this->Ad->add($ad);
            $ad->setVolontaire($this);
        }

        return $this;
    }

    public function removeAd(Administrateur $ad): self
    {
        if ($this->Ad->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getVolontaire() === $this) {
                $ad->setVolontaire(null);
            }
        }

        return $this;
    }
}
