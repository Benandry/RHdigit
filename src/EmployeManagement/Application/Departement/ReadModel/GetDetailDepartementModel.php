<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\ReadModel;

/**
 * Class GetDetailDepartementModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\ReadModel
 */

final readonly class GetDetailDepartementModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?\DateTimeImmutable $createdAt,
        public ?\DateTimeImmutable $updatedAt,
    )
    {
    }
}