<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\Service;

use App\AccessIdentity\Domain\Model\Entity\User;

/**
 * interface PasswordHasherInterface
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\Service
 */

interface PasswordHasherInterface
{
    public function hashPassword(User $user, string $plainPassword): string;
}