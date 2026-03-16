<?php

namespace App\EmployeManagement\Application\UseCase\Query;

/**
 * Class GetListEmploye
 * 
 * @author Eloi Charly <nandry566@gmail.com>
 */

final readonly class GetDetailEmploye
{
    public function __construct(
        public int $employeId
    )
    {
    }
}