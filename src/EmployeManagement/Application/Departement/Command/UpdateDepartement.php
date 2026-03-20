<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\Command;

/**
 * Class UpdateDepartement
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\Command
 */

final readonly class UpdateDepartement
{
    public function __construct(
        public int $departementId,
        public string $name,
        public string $description,
    ) {
    }
}