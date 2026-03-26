<?php

namespace App\AccessIdentity\Presentation\Web\WriteModel;

use App\AccessIdentity\Domain\Model\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

final class UserModel
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

    public static function createFromUser(User $user): self
    {
        return new self(
            username: $user->getUsername(),
            email: $user->getEmail(),
            firstName: $user->getFirstName(),
            lastName: $user->getLastName(),
        );
    }
}