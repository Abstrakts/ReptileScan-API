<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MealsRepository")
 */
class Meals
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
     * @ORM\Column(type="string", length=100)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animals", inversedBy="meals")
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

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrey(): ?string
    {
        return $this->prey;
    }

    public function setPrey(?string $prey): self
    {
        $this->prey = $prey;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

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
