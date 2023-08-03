<?php

namespace App\Entity;

use App\Repository\EntertainmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntertainmentRepository::class)]
class Entertainment
{
    public const Movie = 1;
    public const Book = 2;
    public const Music = 3;
    public const Game = 4;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 80)]
    private ?string $author = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\ManyToMany(targetEntity: EntertainmentGroup::class, mappedBy: 'id_entertainment')]
    private Collection $entertainmentGroups;

    public function __construct()
    {
        $this->entertainmentGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

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
            $entertainmentGroup->addIdEntertainment($this);
        }

        return $this;
    }

    public function removeEntertainmentGroup(EntertainmentGroup $entertainmentGroup): static
    {
        if ($this->entertainmentGroups->removeElement($entertainmentGroup)) {
            $entertainmentGroup->removeIdEntertainment($this);
        }

        return $this;
    }
}
