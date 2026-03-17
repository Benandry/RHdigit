<?php

namespace App\EmployeManagement\Application\UseCase\Command;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Entity\Poste;
use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('sync')]
final class AddEmploye
{
    /*
     * Add whatever properties and methods you need
     * to hold the data for this message class.
     */

    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly string $cin,
        public readonly string $adresse,
        public readonly string $phoneNumber,
        public readonly float $salary,
        public Poste $poste,
        public Contrat $contrat,
        public \DateTimeImmutable $dateOfBirth
    ) {
    }
}
