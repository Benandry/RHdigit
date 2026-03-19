<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\CommandHandler;

use App\EmployeManagement\Application\Employe\Command\RemoveEmploye;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use App\SharedKernel\Application\Command\CommandHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class RemoveEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\CommandHandler
 */

final class RemoveEmployeHandler implements CommandHandler
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
