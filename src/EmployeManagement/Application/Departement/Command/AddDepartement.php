<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\Command;

/**
 * Class AddDepartement
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\Command
 */

final readonly class AddDepartement
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
    }
}