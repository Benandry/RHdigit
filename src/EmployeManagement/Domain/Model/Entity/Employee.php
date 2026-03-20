<?php

namespace App\EmployeManagement\Domain\Model\Entity;

class Employee
{
    public ?int $id = null;
    public ?\DateTimeImmutable $updatedAt = null;

    public string $firstname;
    public string $lastname;
    public string $cin;
    public string $adresse;
    public ?string $phoneNumber;
    public float $salary;
    public ?Poste $poste;
    public ?Contrat $contrat;
    public \DateTimeImmutable $dateOfBirth;
    public ?string $imageName;

    /**
     * Crée un nouvel employé
     */
    public static function create(
        string $firstname,
        string $lastname,
        string $cin,
        string $adresse,
        ?string $phoneNumber,
        float $salary,
        Poste $poste,
        Contrat $contrat,
        \DateTimeImmutable $dateOfBirth,
        ?string $imageName = null
    ): self {
        $employee = new self();
        $employee->firstname = $firstname;
        $employee->lastname = $lastname;
        $employee->cin = $cin;
        $employee->adresse = $adresse;
        $employee->phoneNumber = $phoneNumber;
        $employee->salary = $salary;
        $employee->poste = $poste;
        $employee->contrat = $contrat;
        $employee->dateOfBirth = $dateOfBirth;
        $employee->imageName = $imageName;
        $employee->updatedAt = null;

        // Ajout automatique à Poste et Contrat
        $poste->addEmployee($employee);
        $contrat->addEmployee($employee);

        return $employee;
    }

    /**
     * Met à jour les informations de profil
     */
    public function updateProfile(
        string $firstname,
        string $lastname,
        string $cin,
        string $adresse,
        ?string $phoneNumber,
        float $salary,
        Poste $poste,
        Contrat $contrat
    ): void {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->cin = $cin;
        $this->adresse = $adresse;
        $this->phoneNumber = $phoneNumber;
        $this->salary = $salary;

        // Mise à jour des relations
        if ($this->poste !== $poste) {
            $this->poste->removeEmployee($this);
            $poste->addEmployee($this);
            $this->poste = $poste;
        }

        if ($this->contrat !== $contrat) {
            $this->contrat->removeEmployee($this);
            $contrat->addEmployee($this);
            $this->contrat = $contrat;
        }

        $this->updateDate();
    }

    /**
     * Met à jour la date de modification
     */
    public function updateDate(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}