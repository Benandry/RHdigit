<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\WriteModel;

use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\EmployeManagement\Domain\Model\Entity\Poste;

/**
 * Class PosteModel
 * 
 * @author Charly <nandry@gmail.com>
 * @package App\EmployeManagement\Presentation\Web\WriteModel
 */

final class PosteModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?Departement $departement = null,
    )
    {
    }

    public static function createModelFromEntity(Poste $poste): self
    {
        return new self(
            $poste->name,
            $poste->description,
            $poste->departement,
        );
    }
}