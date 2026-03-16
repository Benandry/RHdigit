<?php

namespace App\EmployeManagement\Application\UseCase\CommandHandler;

use App\EmployeManagement\Application\UseCase\Command\UpdateEmploye;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UpdateEmployeHandler
{
    public function __construct(
        private readonly EmployeRepository $repository
    )
    {
    }
    public function __invoke(UpdateEmploye $command): void
    {
        $employe = $this->repository->getById($command->employeId);
         
        $employe->setFirstname($command->firstname)
                ->setLastname($command->lastname)
                ->setCin($command->cin)
                ->setAdresse($command->adresse)
                ->setSalary($command->salary)
                ->setPhoneNumber($command->phoneNumber)
                ->setPoste($command->poste)
                ->setContrat($command->contrat)
                ->setDateOfBirth($command->dateOfBirth)
            ;

        $this->repository->add($employe);
    }
}
