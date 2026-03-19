<?php

declare(strict_types=1);

namespace App\EmployeManagement\Domain\Model\Repository;

use App\EmployeManagement\Domain\Model\Entity\Departement;

/**
 * Class DepartementRepository
 * 
 * @author Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Domain\Model\Repository
 */

interface DepartementRepository
{
    public function add(Departement $departement): void;

    public function getById(int $id): Departement;

    public function remove(Departement $departement): void;
}