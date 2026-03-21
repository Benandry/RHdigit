<?php

declare(strict_types=1);

namespace App\EmployeManagement\Domain\Model\Repository;

use App\EmployeManagement\Domain\Model\Entity\Contrat;

/**
 * Class ContratRepository
 * 
 * @author Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Domain\Model\Repository
 */

interface ContratRepository
{
    public function add(Contrat $contrat): void;

    public function getById(int $id): Contrat;

    public function remove(Contrat $contrat): void;
}