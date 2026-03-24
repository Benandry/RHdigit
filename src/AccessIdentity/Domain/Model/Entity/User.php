<?php

namespace App\AccessIdentity\Domain\Model\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private ?int $id = null;
   private function __construct(
        private string $email,
        private string $password,
        private string $username,
        private string $firstName,
        private string $lastName,
        private array $roles = ['ROLE_USER'],
        private bool $isVerified = false,
        private bool $isActive = true,
    ) {}

    public static function register(
        string $email,
        string $hashedPassword,
        string $username,
        string $firstName,
        string $lastName
    ): self {
        // Ici, vous pouvez ajouter des validations métier simples
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email invalide");
        }

        return new self(
            $email,
            $hashedPassword,
            $username,
            $firstName,
            $lastName
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }


    public function getPassword(): string
    {
        return $this->password ?? '';
    }


    public function eraseCredentials(): void {}

    public function getUsername(): ?string
    {
        return $this->username;
    }


    public function isVerified(): bool
    {
        return $this->isVerified;
    }



    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }


    public function getLastName(): ?string
    {
        return $this->lastName;
    }

}