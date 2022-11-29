<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationRepository::class)
 */
class Association
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Fistname;
    /**
     * @ORM\Column(type="string", length=50)
     */


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;


    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $local;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $object;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFistname(): ?string
    {
        return $this->Fistname;
    }

    public function setFistname(string $Fistname): self
    {
        $this->Fistname = $Fistname;

        return $this;
    }




    public function getEmail(): ?string
    {
        return this->$email;}


    public function setEmail(string $email): self
    {
        $this->email = $email;

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
    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }
}
