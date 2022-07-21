<?php

namespace App\Entity;

use App\Repository\CapacityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapacityRepository::class)]
class Capacity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'capacity', targetEntity: Bestiary::class)]
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
            $bestiary->setCapacity($this);
        }

        return $this;
    }

    public function removeBestiary(Bestiary $bestiary): self
    {
        if ($this->bestiaries->removeElement($bestiary)) {
            // set the owning side to null (unless already changed)
            if ($bestiary->getCapacity() === $this) {
                $bestiary->setCapacity(null);
            }
        }

        return $this;
    }
}
