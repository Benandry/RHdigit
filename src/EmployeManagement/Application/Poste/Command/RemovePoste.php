<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\Command;

/**
 * Class RemovePoste
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\Command
 */

final readonly class RemovePoste
{
    public function __construct(
        public int $posteId
    ) {
    }
}