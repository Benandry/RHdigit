<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\ReadModel;

use DateTimeImmutable;

/**
 * Class GetDetailEmployeModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 */

final class GetDetailEmployeModel
{
    public function __construct(
        public int $id,
        public string $firstname,
        public string $lastname,
        public string $cin,
        public string $adresse,
        public string $phoneNumber,
        public float $salary,
        public ?DateTimeImmutable $dateOfBirth,
        public ?string $imageName,
        public ?DateTimeImmutable $updatedAt,
        public int $posteId,
        public int $contratId,
        public string $posteName,
        public string $contratName,
        public string $departementName
    )
    {
    }
}