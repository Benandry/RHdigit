<?php

declare(strict_types=1);
namespace App\EmployeManagement\Application\Employe\Command;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Entity\Poste;
/**
 * Class UpdateEmploye
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\Command
 */
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
