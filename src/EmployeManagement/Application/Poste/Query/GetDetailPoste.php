<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\Query;

/**
 * Class GetDetailPoste
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Query
 */

final readonly class GetDetailPoste 
{
    public function __construct(
        public int $posteId
    )
    {
    }
}