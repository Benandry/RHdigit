<?php

namespace App\EmployeManagement\Domain\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Poste
{
    public ?int $id = null;
    public ?string $name = null;
    public ?Departement $departement = null;
    public ?string $description = null;
    public ?\DateTimeImmutable $createdAt = null;
    public ?\DateTimeImmutable $updatedAt = null;

    /** @var Collection<int, Employee> */
      public Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public static function create(string $name, ?Departement $departement = null, ?string $description = null): self
    {
        $poste = new self();
        $poste->name = $name;
        $poste->departement = $departement;
        $poste->description = $description;
        $poste->createdAt = new \DateTimeImmutable();
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
       if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
            $employee->poste = $this;
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            if ($employee->poste === $this) {
                $employee->poste = null;
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