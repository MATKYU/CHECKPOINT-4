<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $name;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Bestiary::class)]
    private Collection $bestiaries;

    public function __construct()
    {
        $this->bestiaries = new ArrayCollection();
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

    /**
     * @return Collection<int, Bestiary>
     */
    public function getBestiaries(): Collection
    {
        return $this->bestiaries;
    }

    public function addBestiary(Bestiary $bestiary): self
    {
        if (!$this->bestiaries->contains($bestiary)) {
            $this->bestiaries[] = $bestiary;
            $bestiary->setPlace($this);
        }

        return $this;
    }

    public function removeBestiary(Bestiary $bestiary): self
    {
        if ($this->bestiaries->removeElement($bestiary)) {
            // set the owning side to null (unless already changed)
            if ($bestiary->getPlace() === $this) {
                $bestiary->setPlace(null);
            }
        }

        return $this;
    }
}
