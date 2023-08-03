<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $genre = null;

    #[ORM\ManyToMany(targetEntity: EntertainmentGroup::class, mappedBy: 'id_group')]
    private Collection $entertainmentGroups;

    public function __construct()
    {
        $this->entertainmentGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection<int, EntertainmentGroup>
     */
    public function getEntertainmentGroups(): Collection
    {
        return $this->entertainmentGroups;
    }

    public function addEntertainmentGroup(EntertainmentGroup $entertainmentGroup): static
    {
        if (!$this->entertainmentGroups->contains($entertainmentGroup)) {
            $this->entertainmentGroups->add($entertainmentGroup);
            $entertainmentGroup->addIdGroup($this);
        }

        return $this;
    }

    public function removeEntertainmentGroup(EntertainmentGroup $entertainmentGroup): static
    {
        if ($this->entertainmentGroups->removeElement($entertainmentGroup)) {
            $entertainmentGroup->removeIdGroup($this);
        }

        return $this;
    }
}
