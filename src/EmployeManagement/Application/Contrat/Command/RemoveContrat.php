<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\Command;

/**
 * Class RemoveContrat
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class RemoveContrat
{
    public function __construct(
        public int $contratId
    ) {
    }
}