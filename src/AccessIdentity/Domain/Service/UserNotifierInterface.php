<?php

declare(strict_types=1);

namespace App\AccessIdentity\Domain\Service;

use App\AccessIdentity\Domain\Model\Entity\User;

interface UserNotifierInterface
{
    public function sendVerificationEmail(User $user): void;
}