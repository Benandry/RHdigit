<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\WriteModel;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\Entity\Contrat;
use App\Entity\Poste;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class EmployeeDto
 * 
 * @author Charly <nandry556@gmail.com>
 */

final class EmployeModel
{
    public function __construct(
        public ?string $firstname = null,
        public ?string $lastname = null,
        public ?string $cin = null,
        public ?string $adresse = null,
        public ?string $phoneNumber = null,
        public ?float $salary = null,
        public ?Poste $poste = null,
        public ?Contrat $contrat = null,
        public ?DateTimeImmutable $dateOfBirth = null,
        public ?File $imageFile = null
    )
    {
    }

    public static function createFromEmployee(Employee $employee): self
    {
        return new self(
            $employee->getFirstname(),
            $employee->getLastname(),
            $employee->getCin(),
            $employee->getAdresse(),
            $employee->getPhoneNumber(),
            $employee->getSalary(),
            $employee->getPoste(),
            $employee->getContrat(),
            $employee->getDateOfBirth(),
            $employee->getImageFile()
        );
    }
    
}