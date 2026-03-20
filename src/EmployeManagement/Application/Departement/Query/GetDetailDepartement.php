<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\Query;

/**
 * Class GetDetailDepartement
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\Query
 */

final readonly class GetDetailDepartement 
{
    public function __construct(
        public int $departementId
    )
    {
    }
}