<?php

namespace App\UseCase\CommandHandler;

use App\Repository\EmployeeRepository;
use App\UseCase\Command\UpdateEmploye;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UpdateEmployeHandler
{
    public function __construct(
        private readonly EmployeeRepository $repository
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
