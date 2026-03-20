<?php

namespace App\EmployeManagement\Domain\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Contrat
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private Collection $employees ;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // (optionnel, souvent évité en DDD)
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }


    public function addEmployee(Employee $employee): self
    {
       if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
            $employee->contrat = $this;
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {  
        if ($this->employees->removeElement($employee)) {
            if ($employee->contrat === $this) {
                $employee->contrat = null;
            }
        }

        return $this;
    }
}