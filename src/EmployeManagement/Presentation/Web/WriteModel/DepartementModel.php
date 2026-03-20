<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\WriteModel;

use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class DepartementModel
 * 
 * @author Charly <nandry@gmail.com>
 * @package App\EmployeManagement\Presentation\Web\WriteModel
 */

final class DepartementModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null
    )
    {
    }

    public static function createModelFromEntity(Departement $departement): self
    {
        return new self(
            $departement->name,
            $departement->description
        );
    }
}