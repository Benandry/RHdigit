<?php

namespace App\AccessIdentity\Presentation\Web\WriteModel;

use Symfony\Component\Validator\Constraints as Assert;

class UserModel
{
    public function __construct(
        #[Assert\NotBlank(message: "Le nom d'utilisateur est obligatoire")]
        public ?string $username = null,

        #[Assert\NotBlank(message: "L'email est obligatoire")]
        #[Assert\Email(message: "Email invalide")]
        public ?string $email = null, 

        #[Assert\NotBlank(message: "Le nom est obligatoire")]
        public ?string $firstName = null,

        #[Assert\NotBlank(message: "Le prénom est obligatoire")]
        public ?string $lastName = null,

    )
    {
    }
}