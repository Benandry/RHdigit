<?php

declare(strict_types=1);
namespace App\EmployeManagement\Application\Employe\Query;

/**
 * Class GetDetailEmploye
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\Query
 */

final readonly class GetDetailEmploye
{
    public function __construct(
        public int $employeId
    )
    {
    }
}