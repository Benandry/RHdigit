<?php

namespace App\EmployeManagement\Domain\Model\Entity;

class Departement
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;
    public array $postes = [];
    public ?\DateTimeImmutable $createdAt = null;
    public ?\DateTimeImmutable $updatedAt = null;

    /**
     * Crée un nouveau Departement
     */
    public static function create(string $name, string $description): self
    {
        $departement = new self();
        $departement->name = $name;
        $departement->description = $description;
        $departement->createdAt = new \DateTimeImmutable();

        return $departement;
    }

    // -----------------------
    // Gestion des Postes
    // -----------------------
    public function addPoste(Poste $poste): self
    {
        if (!in_array($poste, $this->postes, true)) {
            $this->postes[] = $poste;
            $poste->departement = $this;
        }

        return $this;
    }

    public function removePoste(Poste $poste): self
    {
        $this->postes = array_filter(
            $this->postes,
            fn($p) => $p !== $poste
        );

        if ($poste->departement === $this) {
            $poste->departement = null;
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
}