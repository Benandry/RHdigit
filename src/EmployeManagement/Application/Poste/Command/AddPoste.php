<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\Command;

use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class AddPoste
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class AddPoste
{
    public function __construct(
        public string $name,
        public string $description,
        public Departement $departement,
    ) { 
    }
}

/**
 * 
 *   Case mismatch between loaded and declared class names: "App\EmployeManagement\Application\Poste\CommandHandler\AddPosteHandler" vs
 *  "App\EmployeManagement\Application\poste\CommandHandler\AddPosteHandler".
 */