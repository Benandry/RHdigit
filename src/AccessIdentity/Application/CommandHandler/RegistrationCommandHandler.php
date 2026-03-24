<?php 

namespace App\AccessIdentity\Application\CommandHandler;

use App\AccessIdentity\Application\Command\RegistrationCommand;
use App\AccessIdentity\Application\Service\PasswordHasherInterface;
use App\AccessIdentity\Domain\Model\Entity\User;
use App\AccessIdentity\Domain\Model\Repository\UserRepository;
use App\AccessIdentity\Domain\Service\UserNotifierInterface;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class RegistrationCommandHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\CommandHandler
 */

final readonly class RegistrationCommandHandler implements CommandHandler
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
        $user = User::register(
            email: $command->email,
            username: $command->username,
            firstName: $command->firstName,
            lastName: $command->lastName
        );
            
        $hashedPassword = $this->passwordHasher->hashPassword($user, $command->plainPassword);
        $user->setPassword($hashedPassword);

        $this->userRepository->save($user);
        $this->notifier->sendVerificationEmail($user);
    }
}