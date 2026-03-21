<?php

declare(strict_types=1);

namespace App\EmployeManagement\Domain\Model\Repository;

use App\EmployeManagement\Domain\Model\Entity\Poste;

/**
 * Class PosteRepository
 * 
 * @author Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Domain\Model\Repository
 */

interface PosteRepository
{
    public function add(Poste $poste): void;

    public function getById(int $id): Poste;

    public function remove(Poste $poste): void;
}