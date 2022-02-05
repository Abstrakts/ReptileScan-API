<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationsRepository")
 */
class Notifications
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
    private $title;

    /**
     * @ORM\Column(type="bigint")
     */
    private $timer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animals", inversedBy="notifications")
     */
    private $animal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTimer(): ?string
    {
        return $this->timer;
    }

    public function setTimer(string $timer): self
    {
        $this->timer = $timer;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

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
