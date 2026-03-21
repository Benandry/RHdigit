<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\CommandHandler;

use App\EmployeManagement\Application\Contrat\Command\RemoveContrat;
use App\EmployeManagement\Domain\Model\Repository\ContratRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class RemoveContratHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class RemoveContratHandler implements CommandHandler
{
    public function __construct(
        private ContratRepository $contratRepository
    )
    {
    }
    public function __invoke(RemoveContrat $command)
    {
        $contrat =  $this->contratRepository->getById($command->contratId);

        $this->contratRepository->remove($contrat);
    }
}