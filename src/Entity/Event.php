<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: Theme::class, inversedBy: 'events')]
    private Collection $Events;

    #[ORM\ManyToMany(targetEntity: Volontairee::class, mappedBy: 'ev')]
    private Collection $volontairees;

    public function __construct()
    {
        $this->Events = new ArrayCollection();
        $this->volontairees = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getEvents(): Collection
    {
        return $this->Events;
    }

    public function addEvent(Theme $event): self
    {
        if (!$this->Events->contains($event)) {
            $this->Events->add($event);
        }

        return $this;
    }

    public function removeEvent(Theme $event): self
    {
        $this->Events->removeElement($event);

        return $this;
    }

    /**
     * @return Collection<int, Volontairee>
     */
    public function getVolontairees(): Collection
    {
        return $this->volontairees;
    }

    public function addVolontairee(Volontairee $volontairee): self
    {
        if (!$this->volontairees->contains($volontairee)) {
            $this->volontairees->add($volontairee);
            $volontairee->addEv($this);
        }

        return $this;
    }

    public function removeVolontairee(Volontairee $volontairee): self
    {
        if ($this->volontairees->removeElement($volontairee)) {
            $volontairee->removeEv($this);
        }

        return $this;
    }
}
