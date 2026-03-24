<?php 

declare(strict_types=1);

namespace App\Purchase\Domain\Model\Entity;

/**
 * 
 * Class Supplier
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\Purchase\Domain\Model\Entity
 */

class Supplier
{
    private ?int $id = null;
    private string $name;
    private ?string $email;
    private ?string $address;
    private ?string $phone;
    private ?string $siret;
    private ?bool $status;

    public function __construct(string $name, ?string $email, ?string $phone, ?string $address = null, ?string $siret = null, ?bool $status = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->siret = $siret;
        $this->status = $status;
    }

    public function rename(string $name): void
    {
        $this->name = $name;
    }

    public function updateContact(?string $email, ?string $phone): void
    {
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): ?string { return $this->email; }
    public function getPhone(): ?string { return $this->phone; }
    public function getAddress(): ?string { return $this->address; }
    public function getSiret(): ?string { return $this->siret; }
    public function getStatus(): ?bool { return $this->status; }

}
