<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\WriteModel;

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
}