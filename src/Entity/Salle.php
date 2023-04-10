<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\DispoConstraint as validation;


#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: " Numéro doit etre non vide")]
    #[ORM\Column]
    #[Assert\Positive]
    private ?int $num_salle = null;

    
    #[ORM\Column]
    #[Assert\Valid]
    #[Assert\Choice(choices: [0, 1])]
    private ?int $dispo = null;

    #[ORM\ManyToOne(inversedBy: 'salle')]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSalle(): ?int
    {
        return $this->num_salle;
    }

    public function setNumSalle(int $num_salle): self
    {
        $this->num_salle = $num_salle;

        return $this;
    }

    public function getDispo(): ?int
    {
        return $this->dispo;
    }

    public function setDispo(int $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }
}
