<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\Query;

/**
 * Class GetDetailContrat
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\Query
 */

final readonly class GetDetailContrat 
{
    public function __construct(
        public int $contratId
    )
    {
    }
}