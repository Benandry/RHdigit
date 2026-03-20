<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\ReadModel;

use DomainException;

/**
 * Class GetListDepartementModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\ReadModel
 */

final readonly class GetListDepartementModel
{
    public function __construct(
        public array $items,
    )
    {
        foreach ($items as $item) {
           if (!$item instanceof GetDetailDepartementModel) {
                throw new DomainException("Items is not valid");
           }
        }
    }
}