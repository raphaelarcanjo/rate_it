<?php

namespace App\Entity;

use App\Repository\EntertainmentCollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntertainmentCollectionRepository::class)]
class EntertainmentCollection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Entertainment::class, inversedBy: 'entertainmentCollections')]
    private Collection $id_entertainment;

    #[ORM\ManyToMany(targetEntity: Collection::class)]
    private Collection $id_collection;

    public function __construct()
    {
        $this->id_entertainment = new ArrayCollection();
        $this->id_collection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Entertainment>
     */
    public function getIdEntertainment(): Collection
    {
        return $this->id_entertainment;
    }

    public function addIdEntertainment(Entertainment $idEntertainment): static
    {
        if (!$this->id_entertainment->contains($idEntertainment)) {
            $this->id_entertainment->add($idEntertainment);
        }

        return $this;
    }

    public function removeIdEntertainment(Entertainment $idEntertainment): static
    {
        $this->id_entertainment->removeElement($idEntertainment);

        return $this;
    }

    /**
     * @return Collection<int, Collection>
     */
    public function getIdCollection(): Collection
    {
        return $this->id_collection;
    }

    public function addIdCollection(Collection $idCollection): static
    {
        if (!$this->id_collection->contains($idCollection)) {
            $this->id_collection->add($idCollection);
        }

        return $this;
    }

    public function removeIdCollection(Collection $idCollection): static
    {
        $this->id_collection->removeElement($idCollection);

        return $this;
    }
}
