<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\ReadModel;

/**
 * Class GetDetailContratModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\ReadModel
 */

final readonly class GetDetailContratModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description
    )
    {
    }
}