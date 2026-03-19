<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\CommandHandler;

use App\EmployeManagement\Application\Employe\Command\AddEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class AddEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\CommandHandler
 */


final class AddEmployeHandler implements CommandHandler
{
    public function __construct(
        private readonly EmployeRepository $repository
    )
    {
    }
    public function __invoke(AddEmploye $command): void
    {
       $employe = new Employee(
            $command->firstname,
            $command->lastname,
            $command->cin,
            $command->adresse,
            $command->phoneNumber,
            $command->salary,
            $command->poste,
            $command->contrat,
            $command->dateOfBirth,
        );
        
        $this->repository->add($employe);
    }
}
