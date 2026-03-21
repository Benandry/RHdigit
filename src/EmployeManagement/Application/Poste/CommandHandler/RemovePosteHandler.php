<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\CommandHandler;

use App\EmployeManagement\Application\Poste\Command\RemovePoste;
use App\EmployeManagement\Domain\Model\Repository\PosteRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class RemovePosteHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class RemovePosteHandler implements CommandHandler
{
    public function __construct(
        private PosteRepository $posteRepository
    )
    {
    }
    public function __invoke(RemovePoste $command)
    {
        $poste =  $this->posteRepository->getById($command->posteId);

        $this->posteRepository->remove($poste);
    }
}