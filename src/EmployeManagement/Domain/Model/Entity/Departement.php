<?php

namespace App\EmployeManagement\Domain\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Departement
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;
    public Collection $postes;
    public ?\DateTimeImmutable $createdAt = null;
    public ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->postes = new ArrayCollection();
    }

    public static function create(string $name, string $description): self
    {
        $departement = new self();
        $departement->name = $name;
        $departement->description = $description;
        
        return $departement;
    }


    public function update(string $name, string $description): self
    {
        $this->name = $name;
        $this->description = $description;

        return $this;
    }

    // -----------------------
    // Gestion des Postes
    // -----------------------
    public function addPoste(Poste $poste): self
    {
        if (!$this->postes->contains($poste)) {
            $this->postes->add($poste);
            $poste->departement = $this;
        }

        return $this;
    }

    public function removePoste(Poste $poste): self
    {
        if ($this->postes->removeElement($poste)) {
            if ($poste->departement === $this) {
                $poste->departement = null;
            }
        }

        return $this;
    }

    // -----------------------
    // Mise à jour des dates
    // -----------------------
    public function markUpdated(): self
    {
        $this->updatedAt = new \DateTimeImmutable();
        return $this;
    }

    public function markCreated(): void
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }
}