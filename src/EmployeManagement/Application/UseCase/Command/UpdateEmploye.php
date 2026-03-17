<?php

namespace App\EmployeManagement\Application\UseCase\Command;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Entity\Poste;
use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('sync')]
final readonly class UpdateEmploye
{
    /*
     * Add whatever properties and methods you need
     * to hold the data for this message class.
     */

    public function __construct(
        public int $employeId,
        public string $firstname,
        public string $lastname,
        public string $cin,
        public string $adresse,
        public string $phoneNumber,
        public float $salary,
        public Poste $poste,
        public Contrat $contrat,
        public \DateTimeImmutable $dateOfBirth
    ) {
    }
}
