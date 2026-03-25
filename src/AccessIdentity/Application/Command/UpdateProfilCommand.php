<?php 

declare(strict_types=1);

namespace App\AccessIdentity\Application\Command;

/**
 * Class UpdateProfilCommand
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\Command
 */


final readonly class UpdateProfilCommand
{
    public function __construct(
        public int $userId,
        public string $username,
        public string $email,
        public string $firstName,
        public string $lastName,
    )
    {
    }
}