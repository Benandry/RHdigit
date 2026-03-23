<?php

namespace App\EmployeManagement\Domain\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class  Contrat
{
    public ?int $id = null;
    public Collection $employees ;

    public function __construct(
        public string $name,
        public string $description
    )
    {
        $this->employees = new ArrayCollection();
    }

    public static function create(string $name, string $description): self
    {
        return new self(
            $name,
            $description
        );
    }

    public function update(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
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