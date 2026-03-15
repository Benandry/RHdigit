<?php

declare(strict_types=1);

namespace App\Dto;

/**
 * Class EmployeeDto
 * 
 * @author Charly <nandry556@gmail.com>
 */

final readonly class EmployeeDto
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $cin,
        public string $adresse,
        public string $phoneNumber,
        public float $salary
    )
    {
    }
}