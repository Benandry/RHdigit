<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\CommandHandler;

use App\EmployeManagement\Application\Employe\Command\AddEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class AddEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\CommandHandler
 */


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
