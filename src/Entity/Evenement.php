<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: " Nom doit etre non vide")]
    #[Assert\Length(min : 4,minMessage:" Entrer un nom au mini de 4 caractères")]
    #[ORM\Column(length: 255)]
    private ?string $nom_evn = null;

    #[Assert\NotBlank(message: " Libelle doit etre non vide")]
    #[Assert\Length(min : 3,minMessage:" Entrer un libelle au mini de 3 caractères")]
    #[ORM\Column(length: 255)]
    private ?string $libelle_evn = null;

    #[Assert\NotBlank(message: " Type doit etre non vide")]
    #[Assert\Length(min : 4,minMessage:" Entrer un type au mini de 4 caractères")]
    #[ORM\Column(length: 255)]
    private ?string $type_evn = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_evn = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvn(): ?string
    {
        return $this->nom_evn;
    }

    public function setNomEvn(string $nom_evn): self
    {
        $this->nom_evn = $nom_evn;

        return $this;
    }

    public function getLibelleEvn(): ?string
    {
        return $this->libelle_evn;
    }

    public function setLibelleEvn(string $libelle_evn): self
    {
        $this->libelle_evn = $libelle_evn;

        return $this;
    }

    public function getTypeEvn(): ?string
    {
        return $this->type_evn;
    }

    public function setTypeEvn(string $type_evn): self
    {
        $this->type_evn = $type_evn;

        return $this;
    }

    public function getDateEvn(): ?\DateTimeInterface
    {
        return $this->date_evn;
    }

    public function setDateEvn(\DateTimeInterface $date_evn): self
    {
        $this->date_evn = $date_evn;

        return $this;
    }

    public function getLocation(): ?location
    {
        return $this->location;
    }

    public function setLocation(?location $location): self
    {
        $this->location = $location;

        return $this;
    }
}
