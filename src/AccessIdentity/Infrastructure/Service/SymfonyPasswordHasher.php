<?php 

declare(strict_types=1);

namespace App\AccessIdentity\Infrastructure\Service;

use App\AccessIdentity\Application\Service\PasswordHasherInterface;
use App\AccessIdentity\Domain\Model\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


/**
 * Class SymfonyPasswordHasher
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Infrastructure\Security
 */

final class SymfonyPasswordHasher implements PasswordHasherInterface
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    ) {}

    public function hashPassword(User $user, string $plaintextPassword): string
    {
        
        return $this->userPasswordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
    }

    // generate a signed url and email it to the user
        // $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
        //     (new TemplatedEmail())
        //         ->from(new Address('nandry556@gmail.com', 'supportrhdigit'))
        //         ->to($user->getEmail())
        //         ->subject('Please Confirm your Email')
        //         ->htmlTemplate('registration/confirmation_email.html.twig')
        // );
}