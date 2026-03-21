<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\CommandHandler;

use App\EmployeManagement\Application\Poste\Command\UpdatePoste;
use App\EmployeManagement\Domain\Model\Repository\PosteRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class UpdatePosteHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class UpdatePosteHandler implements CommandHandler
{
    public function __construct(
        private PosteRepository $posteRepository
    )
    {
    }
    public function __invoke(UpdatePoste $command)
    {
        $poste =  $this->posteRepository->getById($command->posteId);
        
        $poste->update(
            name: $command->name,
            departement: $command->departement,
            description: $command->description
        );

        $this->posteRepository->add($poste);
    }
}