<?php

declare(strict_types=1);

namespace App\AccessIdentity\Domain\Model\Repository;

use App\AccessIdentity\Domain\Model\Entity\User;

/**
 * interface UserRepository
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Domain\Model\Repository
 */

interface UserRepository
{
    public function save(User $user): void;
    public function getById(int $userId): User;
}