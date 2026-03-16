<?php

namespace App\UseCase\CommandHandler;

use App\Repository\EmployeeRepository;
use App\UseCase\Command\RemoveEmploye;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class RemoveEmployeHandler
{
    public function __construct(
        private readonly EmployeeRepository $repository
    )
    {
    }
    public function __invoke(RemoveEmploye $command): void
    {
        $employe = $this->repository->getById($command->employeId);

        $this->repository->remove($employe);
    }
}
