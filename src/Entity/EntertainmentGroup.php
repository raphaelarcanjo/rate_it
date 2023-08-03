<?php

namespace App\Entity;

use App\Repository\EntertainmentGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntertainmentGroupRepository::class)]
class EntertainmentGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Entertainment::class, inversedBy: 'entertainmentGroups')]
    private Collection $id_entertainment;

    #[ORM\ManyToMany(targetEntity: Group::class, inversedBy: 'entertainmentGroups')]
    private Collection $id_group;

    public function __construct()
    {
        $this->id_entertainment = new ArrayCollection();
        $this->id_group = new ArrayCollection();
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
     * @return Collection<int, Group>
     */
    public function getIdGroup(): Collection
    {
        return $this->id_group;
    }

    public function addIdGroup(Group $idGroup): static
    {
        if (!$this->id_group->contains($idGroup)) {
            $this->id_group->add($idGroup);
        }

        return $this;
    }

    public function removeIdGroup(Group $idGroup): static
    {
        $this->id_group->removeElement($idGroup);

        return $this;
    }
}
