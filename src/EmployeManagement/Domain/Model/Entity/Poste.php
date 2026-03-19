<?php

namespace App\EmployeManagement\Domain\Model\Entity;

class Poste
{
    public ?int $id = null;
    public ?string $name = null;
    public ?Departement $departement = null;
    public ?string $description = null;
    public ?\DateTimeImmutable $createdAt = null;
    public ?\DateTimeImmutable $updatedAt = null;

    /** @var Employee[] */
    public array $employees = [];

    /**
     * Crée un nouveau poste
     */
    public static function create(string $name, ?Departement $departement = null, ?string $description = null): self
    {
        $poste = new self();
        $poste->name = $name;
        $poste->departement = $departement;
        $poste->description = $description;
        $poste->createdAt = new \DateTimeImmutable();

        // Si un département est fourni, on l'ajoute automatiquement
        if ($departement !== null) {
            $departement->addPoste($poste);
        }

        return $poste;
    }

    // -----------------------
    // Gestion des employés
    // -----------------------
    public function addEmployee(Employee $employee): self
    {
        if (!in_array($employee, $this->employees, true)) {
            $this->employees[] = $employee;
            $employee->poste = $this;
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        $this->employees = array_filter(
            $this->employees,
            fn($e) => $e !== $employee
        );

        if ($employee->poste === $this) {
            $employee->poste = null;
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