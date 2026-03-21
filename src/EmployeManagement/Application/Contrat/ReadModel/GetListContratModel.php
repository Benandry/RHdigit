<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\ReadModel;

use DomainException;

/**
 * Class GetListContratModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\ReadModel
 */

final readonly class GetListContratModel
{
    public function __construct(
        public array $items,
    )
    {
        foreach ($items as $item) {
           if (!$item instanceof GetDetailContratModel) {
                throw new DomainException("Item is not valid");
           }
        }
    }
}