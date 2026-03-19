<?php

namespace App\EmployeManagement\Domain\Model\Entity;

class Contrat
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;

    /**
     * @var Employee[]
     */
    private array $employees = [];

    public function __construct()
    {
        $this->employees = [];
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

    /**
     * @return Employee[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!in_array($employee, $this->employees, true)) {
            $this->employees[] = $employee;
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        $this->employees = array_filter(
            $this->employees,
            fn ($e) => $e !== $employee
        );

        return $this;
    }
}