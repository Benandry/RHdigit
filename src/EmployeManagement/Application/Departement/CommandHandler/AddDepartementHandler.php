<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\CommandHandler;

use App\EmployeManagement\Application\Departement\Command\AddDepartement;
use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\EmployeManagement\Domain\Model\Repository\DepartementRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class AddDepartementHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\Command
 */

final readonly class AddDepartementHandler implements CommandHandler
{
    public function __construct(
        private DepartementRepository $repository
    )
    {
    }
    public function __invoke(AddDepartement $command)
    {
        $departement = Departement::create(
            name: $command->name,
            description: $command->description
        );

        $this->repository->add($departement);
    }
}