<?php 

namespace App\AccessIdentity\Application\Command;

class RegistrationCommand
{
    public function __construct(
        public string $username,
        public string $email,
        public string $firstName,
        public string $lastName,
        public string $plainPassword
    )
    {
    }
}