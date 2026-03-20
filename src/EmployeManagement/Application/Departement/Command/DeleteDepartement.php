<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\Command;

/**
 * Class DeleteDepartement
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\Command
 */

final readonly class DeleteDepartement
{
    public function __construct(
        public int $departementId
    ) {
    }
}