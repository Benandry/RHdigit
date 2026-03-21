<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\ReadModel;

use DomainException;

/**
 * Class GetListPosteModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\ReadModel
 */

final readonly class GetListPosteModel
{
    public function __construct(
        public array $items,
    )
    {
        foreach ($items as $item) {
           if (!$item instanceof GetDetailPosteModel) {
                throw new DomainException("Item is not valid");
           }
        }
    }
}