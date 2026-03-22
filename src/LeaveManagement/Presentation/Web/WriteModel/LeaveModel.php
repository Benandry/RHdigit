<?php

namespace App\LeaveManagement\Presentation\Web\WriteModel;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\LeaveManagement\Domain\Model\Entity\Leave;
use Symfony\Component\Validator\Constraints as Assert;

final class LeaveModel
{
   public function __construct(
        #[Assert\NotNull]
        #[Assert\Type(\DateTimeImmutable::class)]
        public ?\DateTimeImmutable $staredAt = null,
        #[Assert\NotNull]
        #[Assert\Positive]
        public ?int $numberOfDay = null,
        #[Assert\NotBlank]
        #[Assert\Choice(choices: ['pending', 'approved', 'rejected'])]
        public ?string $status = null,
        #[Assert\NotBlank]
        #[Assert\Length(max: 1000)]
        public ?string $motif = null,
        #[Assert\NotNull]
        public ?Employee $employee = null,
   )
   {
   }

   public static function createModelFromEntity(Leave $leave): self
   {
        return new self(
            $leave->getStaredAt(),
            $leave->getNumberOfDay(),
            $leave->getStatus(),
            $leave->getMotif(),
            $leave->getEmployee(),
        );
   } 
}