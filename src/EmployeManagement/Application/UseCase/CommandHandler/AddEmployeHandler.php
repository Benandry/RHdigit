<?php

namespace App\EmployeManagement\Application\UseCase\CommandHandler;

use App\EmployeManagement\Application\UseCase\Command\AddEmploye;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use App\Entity\Employee;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler('command.bus')]
final class AddEmployeHandler
{
    public function __construct(
        private readonly EmployeRepository $repository
    )
    {
    }
    public function __invoke(AddEmploye $message): void
    {
       $employe = new Employee();

       $employe->setFirstname($message->firstname)
            ->setLastname($message->lastname)
            ->setCin($message->cin)
            ->setAdresse($message->adresse)
            ->setSalary($message->salary)
            ->setPhoneNumber($message->phoneNumber)
            ->setPoste($message->poste)
            ->setContrat($message->contrat)
            ->setDateOfBirth($message->dateOfBirth)
        ;

        $this->repository->add($employe);
    }
}
