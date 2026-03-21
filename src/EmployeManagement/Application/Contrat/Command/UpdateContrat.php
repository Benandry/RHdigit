<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\Command;

/**
 * Class UpdateContrat
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class UpdateContrat
{
    public function __construct(
        public int $contratId,
        public string $name,
        public string $description,
    ) {
    }
}