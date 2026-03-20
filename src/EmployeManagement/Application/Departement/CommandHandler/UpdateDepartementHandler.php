<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\CommandHandler;

use App\EmployeManagement\Application\Departement\Command\UpdateDepartement;
use App\EmployeManagement\Domain\Model\Repository\DepartementRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class UpdateDepartementHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\CommandHandler
 */

final readonly class UpdateDepartementHandler implements CommandHandler
{
    public function __construct(
        private DepartementRepository $repository
    )
    {
    }
    public function __invoke(UpdateDepartement $command)
    {
        
        $departement = $this->repository->getById($command->departementId);

        $departement->update(
            $command->name,
            $command->description
        );

        $this->repository->add($departement);
    }
}