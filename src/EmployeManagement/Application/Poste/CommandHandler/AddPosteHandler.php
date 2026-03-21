<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\CommandHandler;

use App\EmployeManagement\Application\Poste\Command\AddPoste;
use App\EmployeManagement\Domain\Model\Entity\Poste;
use App\EmployeManagement\Domain\Model\Repository\PosteRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class AddPosteHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class AddPosteHandler implements CommandHandler
{
    public function __construct(
        private PosteRepository $posteRepository
    )
    {
    }
    public function __invoke(AddPoste $command)
    {
         $poste = Poste::create(
            name: $command->name,
            departement: $command->departement,
            description: $command->description
        );

        $this->posteRepository->add($poste);
    }
}