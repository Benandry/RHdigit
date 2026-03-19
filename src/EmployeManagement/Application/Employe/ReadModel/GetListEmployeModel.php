<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\ReadModel;

/**
 * Class GetListEmployeModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 */

final class GetListEmployeModel
{
    public function __construct(
        public array $items
    )
    {
        foreach ($this->items as $item) {
            if (!$item instanceof GetDetailEmployeModel) {
                throw new \InvalidArgumentException('Items must be an array of GetDetailEmployeModel instances.');
            }
        }
    }
}