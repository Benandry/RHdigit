<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\CommandHandler;

use App\EmployeManagement\Application\Departement\Command\DeleteDepartement;
use App\EmployeManagement\Domain\Model\Repository\DepartementRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class DeleteDepartementHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\CommandHandler
 */

final readonly class DeleteDepartementHandler implements CommandHandler
{
    public function __construct(
        private DepartementRepository $repository
    )
    {
    }
    public function __invoke(DeleteDepartement $command): void
    {
        $departement = $this->repository->getById($command->departementId);
        $this->repository->remove($departement);
    }
}