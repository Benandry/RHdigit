<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\CommandHandler;

use App\EmployeManagement\Application\Contrat\Command\UpdateContrat;
use App\EmployeManagement\Domain\Model\Repository\ContratRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class UpdateContratHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class UpdateContratHandler implements CommandHandler
{
    public function __construct(
        private ContratRepository $contratRepository
    )
    {
    }
    public function __invoke(UpdateContrat $command)
    {
        $contrat =  $this->contratRepository->getById($command->contratId);

        $contrat->update(
            name: $command->name,
            description: $command->description
        );

        $this->contratRepository->add($contrat);
    }
}