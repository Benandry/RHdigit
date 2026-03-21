<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\Command;

/**
 * Class AddContrat
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Command
 */

final readonly class AddContrat
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
    }
}