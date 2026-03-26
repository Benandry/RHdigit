<?php 

declare(strict_types=1);

namespace App\AccessIdentity\Application\CommandHandler;

use App\AccessIdentity\Application\Command\UpdateProfilCommand;
use App\AccessIdentity\Domain\Model\Repository\UserRepository;
use App\SharedKernel\Application\Command\CommandHandler;

/**
 * Class UpdateProfilCommandHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\Command
 */


final readonly class UpdateProfilCommandHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function __invoke(UpdateProfilCommand $command)
    {
        $user = $this->userRepository->getById($command->userId);

        $user->updateProfile(
             $command->username,
            $command->firstName,
            $command->lastName,
            $command->email
        );


        $this->userRepository->save($user);
    }
}