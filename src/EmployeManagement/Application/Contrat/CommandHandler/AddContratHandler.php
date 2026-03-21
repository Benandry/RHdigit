<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\CommandHandler;

use App\EmployeManagement\Application\Contrat\Command\AddContrat;
use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Repository\ContratRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class AddContratHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class AddContratHandler implements CommandHandler
{
    public function __construct(
        private ContratRepository $contratRepository
    )
    {
    }
    public function __invoke(AddContrat $command)
    {
         $contrat = Contrat::create(
            name: $command->name,
            description: $command->description
        );

        $this->contratRepository->add($contrat);
    }
}