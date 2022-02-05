<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimalsRepository")
 */
class Animals
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $species;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $morph;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="animals")
     */
    private $user;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qrcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthday;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Meals", mappedBy="animal")
     */
    private $meals;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="animals")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Couplings", mappedBy="animal")
     */
    private $couplings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moults", mappedBy="animal")
     */
    private $moults;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notes", mappedBy="animal")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Habitat", mappedBy="animal")
     */
    private $habitats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EggLaying", mappedBy="animal")
     */
    private $eggLayings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notifications", mappedBy="animal")
     */
    private $notifications;


    public function __construct()
    {
        $this->meals = new ArrayCollection();
        $this->couplings = new ArrayCollection();
        $this->moults = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->habitats = new ArrayCollection();
        $this->eggLayings = new ArrayCollection();
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getMorph(): ?string
    {
        return $this->morph;
    }

    public function setMorph(string $morph): self
    {
        $this->morph = $morph;

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

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    public function setQrcode(?string $qrcode): self
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return Collection|Meals[]
     */
    public function getMeals(): Collection
    {
        return $this->meals;
    }

    public function addMeal(Meals $meal): self
    {
        if (!$this->meals->contains($meal)) {
            $this->meals[] = $meal;
            $meal->setAnimal($this);
        }

        return $this;
    }

    public function removeMeal(Meals $meal): self
    {
        if ($this->meals->contains($meal)) {
            $this->meals->removeElement($meal);
            // set the owning side to null (unless already changed)
            if ($meal->getAnimal() === $this) {
                $meal->setAnimal(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Couplings[]
     */
    public function getCouplings(): Collection
    {
        return $this->couplings;
    }

    public function addCoupling(Couplings $coupling): self
    {
        if (!$this->couplings->contains($coupling)) {
            $this->couplings[] = $coupling;
            $coupling->setAnimal($this);
        }

        return $this;
    }

    public function removeCoupling(Couplings $coupling): self
    {
        if ($this->couplings->contains($coupling)) {
            $this->couplings->removeElement($coupling);
            // set the owning side to null (unless already changed)
            if ($coupling->getAnimal() === $this) {
                $coupling->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Moults[]
     */
    public function getMoults(): Collection
    {
        return $this->moults;
    }

    public function addMoult(Moults $moult): self
    {
        if (!$this->moults->contains($moult)) {
            $this->moults[] = $moult;
            $moult->setAnimal($this);
        }

        return $this;
    }

    public function removeMoult(Moults $moult): self
    {
        if ($this->moults->contains($moult)) {
            $this->moults->removeElement($moult);
            // set the owning side to null (unless already changed)
            if ($moult->getAnimal() === $this) {
                $moult->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notes[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Notes $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setAnimal($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getAnimal() === $this) {
                $note->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Habitat[]
     */
    public function getHabitats(): Collection
    {
        return $this->habitats;
    }

    public function addHabitat(Habitat $habitat): self
    {
        if (!$this->habitats->contains($habitat)) {
            $this->habitats[] = $habitat;
            $habitat->setAnimal($this);
        }

        return $this;
    }

    public function removeHabitat(Habitat $habitat): self
    {
        if ($this->habitats->contains($habitat)) {
            $this->habitats->removeElement($habitat);
            // set the owning side to null (unless already changed)
            if ($habitat->getAnimal() === $this) {
                $habitat->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EggLaying[]
     */
    public function getEggLayings(): Collection
    {
        return $this->eggLayings;
    }

    public function addEggLaying(EggLaying $eggLaying): self
    {
        if (!$this->eggLayings->contains($eggLaying)) {
            $this->eggLayings[] = $eggLaying;
            $eggLaying->setAnimal($this);
        }

        return $this;
    }

    public function removeEggLaying(EggLaying $eggLaying): self
    {
        if ($this->eggLayings->contains($eggLaying)) {
            $this->eggLayings->removeElement($eggLaying);
            // set the owning side to null (unless already changed)
            if ($eggLaying->getAnimal() === $this) {
                $eggLaying->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notifications[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notifications $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setAnimal($this);
        }

        return $this;
    }

    public function removeNotification(Notifications $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getAnimal() === $this) {
                $notification->setAnimal(null);
            }
        }

        return $this;
    }

}
