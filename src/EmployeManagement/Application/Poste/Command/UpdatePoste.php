<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\Command;

use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class UpdatePoste
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class UpdatePoste
{
    public function __construct(
        public int $posteId,
        public string $name,
        public string $description,
        public Departement $departement
    ) {
    }
}