<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\ReadModel;

use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class GetDetailPosteModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\ReadModel
 */

final readonly class GetDetailPosteModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public string $departement,
    )
    {
    }
}