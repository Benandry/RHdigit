<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\Service;

use App\AccessIdentity\Domain\Model\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * interface EmailVerificationService
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\Service
 */

interface EmailVerificationService
{
    public function sendEmailConfirmation(string $verifyEmailRouteName, UserInterface $user, TemplatedEmail $email): void;
    public function handleEmailConfirmation(Request $request, User $user): void;
}