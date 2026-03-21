<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\WriteModel;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class ContratModel
 * 
 * @author Charly <nandry@gmail.com>
 * @package App\EmployeManagement\Presentation\Web\WriteModel
 */

final class ContratModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null
    )
    {
    }

    public static function createModelFromEntity(Contrat $contrat): self
    {
        return new self(
            $contrat->name,
            $contrat->description
        );
    }
}