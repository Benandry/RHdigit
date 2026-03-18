<?php

namespace App\EmployeManagement\Application\UseCase\CommandHandler;

use App\EmployeManagement\Application\UseCase\Command\RemoveEmploye;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class RemoveEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\CommandHandler
 */


#[AsMessageHandler('command.bus')]
final class RemoveEmployeHandler
{
    public function __construct(
        private readonly EmployeRepository $repository
    )
    {
    }
    public function __invoke(RemoveEmploye $command): void
    {
        $employe = $this->repository->getById($command->employeId);

        $this->repository->remove($employe);
    }
}
