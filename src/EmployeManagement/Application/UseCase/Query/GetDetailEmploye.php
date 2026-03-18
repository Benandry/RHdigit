<?php

namespace App\EmployeManagement\Application\UseCase\Query;

/**
 * Class GetDetailEmploye
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\Query
 */

final readonly class GetDetailEmploye
{
    public function __construct(
        public int $employeId
    )
    {
    }
}