<?php

declare(strict_types=1);

namespace App\EmployeManagement\Domain\Model\Repository;

use App\EmployeManagement\Domain\Model\Entity\Employee;

/**
 * Class EmployeRepository
 * 
 * @author Charly <nandry556@gmail.com>
 */

interface EmployeRepository
{
    public function add(Employee $employee): void;

    public function getById(int $id): Employee;

    public function remove(Employee $employee): void;
}