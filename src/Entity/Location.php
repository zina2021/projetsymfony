<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: " Prix doit etre non vide")]
    #[ORM\Column]
    #[Assert\Positive]
    private ?float $prix_loc = null;

    #[ORM\OneToMany(mappedBy: 'location', targetEntity: Salle::class)]
    private Collection $salle;

    public function __construct()
    {
        $this->salle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixLoc(): ?float
    {
        return $this->prix_loc;
    }

    public function setPrixLoc(float $prix_loc): self
    {
        $this->prix_loc = $prix_loc;

        return $this;
    }

    /**
     * @return Collection<int, salle>
     */
    public function getSalle(): Collection
    {
        return $this->salle;
    }

    public function addSalle(salle $salle): self
    {
        if (!$this->salle->contains($salle)) {
            $this->salle->add($salle);
            $salle->setLocation($this);
        }

        return $this;
    }

    public function removeSalle(salle $salle): self
    {
        if ($this->salle->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getLocation() === $this) {
                $salle->setLocation(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getId();
    }

}
