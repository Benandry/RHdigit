<?php 

namespace App\AccessIdentity\Application\CommandHandler;

use App\AccessIdentity\Application\Command\RegistrationCommand;
use App\AccessIdentity\Application\Service\PasswordHasherInterface;
use App\AccessIdentity\Domain\Model\Entity\User;
use App\AccessIdentity\Domain\Model\Repository\UserRepository;

/**
 * Class RegistrationCommandHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\CommandHandler
 */

final readonly class RegistrationCommandHandler
{

public function __construct(
    private PasswordHasherInterface $passwordHasher,
    private UserRepository $userRepository,
    private UserNotifierInterface $notifier,
)
{
}
    public function __invoke(RegistrationCommand $command): void
    {
        
        $hashedPassword = $this->passwordHasher->hashPassword($command->plainPassword);
        
        $user =  User::register(
            email: $command->email,
            hashedPassword: $hashedPassword,
            username: $command->username,
            firstName: $command->firstName,
            lastName: $command->lastName
        );


        $this->userRepository->save($user);

        // generate a signed url and email it to the user
        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
            (new TemplatedEmail())
                ->from(new Address('nandry556@gmail.com', 'supportrhdigit'))
                ->to($user->getEmail())
                ->subject('Please Confirm your Email')
                ->htmlTemplate('registration/confirmation_email.html.twig')
        );
            // do anything else you need here, like send an email
    }
}