<?php 

declare(strict_types=1);

namespace App\AccessIdentity\Infrastructure\Service;

use App\AccessIdentity\Application\Service\EmailVerificationService;
use App\AccessIdentity\Domain\Model\Entity\User;
use App\AccessIdentity\Domain\Service\UserNotifierInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;


/**
 * Class UserNotifier
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Infrastructure\Security
 */

final class UserNotifier implements UserNotifierInterface
{
  
    public function __construct(
        private readonly EmailVerificationService $emailVerifier
    )
    {}
    public function sendVerificationEmail(User $user): void
    {  
        // generate a signed url and email it to the user
        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
            (new TemplatedEmail())
                ->from(new Address('nandry556@gmail.com', 'supportrhdigit'))
                ->to($user->getEmail())
                ->subject('Please Confirm your Email')
                ->htmlTemplate('registration/confirmation_email.html.twig')
        );
    }
}

  