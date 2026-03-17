<?php

namespace App\Entity;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\Repository\LeaveRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LeaveRepository::class)]
#[ORM\Table(name: '`leave`')]
class Leave
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'leaves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employee $employee = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?\DateTimeImmutable $staredAt = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?float $numberOfDay = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    #[Assert\Choice(choices: ['pending', 'approved', 'rejected'], message: 'Choose a valid status.')]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    private ?string $motif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }

    public function getStaredAt(): ?\DateTimeImmutable
    {
        return $this->staredAt;
    }

    public function setStaredAt(\DateTimeImmutable $staredAt): static
    {
        $this->staredAt = $staredAt;

        return $this;
    }

    public function getNumberOfDay(): ?float
    {
        return $this->numberOfDay;
    }

    public function setNumberOfDay(float $numberOfDay): static
    {
        $this->numberOfDay = $numberOfDay;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }
}
