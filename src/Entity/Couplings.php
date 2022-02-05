<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouplingsRepository")
 */
class Couplings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $companion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animals", inversedBy="couplings")
     */
    private $animal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCompanion(): ?string
    {
        return $this->companion;
    }

    public function setCompanion(string $companion): self
    {
        $this->companion = $companion;

        return $this;
    }

    public function getAnimal(): ?Animals
    {
        return $this->animal;
    }

    public function setAnimal(?Animals $animal): self
    {
        $this->animal = $animal;

        return $this;
    }
}
