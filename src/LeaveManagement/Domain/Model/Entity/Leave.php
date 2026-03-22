<?php

namespace App\LeaveManagement\Domain\Model\Entity;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use DomainException;

final class Leave
{
    public ?int $id;
    public Employee $employee;
    public \DateTimeImmutable $staredAt;
    public float $numberOfDay;
    public string $status;
    public string $motif;

    private const STATUS_PENDING = 'pending';
    private const STATUS_APPROVED = 'approved';
    private const STATUS_REJECTED = 'rejected';

    public static function create(
        Employee $employee,
        \DateTimeImmutable $staredAt,
        float $numberOfDay,
        string $motif
    ): self {
        $leave = new self();

        $leave->employee = $employee;
        $leave->staredAt = $staredAt;
        $leave->numberOfDay = $numberOfDay;
        $leave->status = self::STATUS_REJECTED;
        $leave->motif = $motif;

        return $leave;
    }

    public function approve(): void
    {
        if ($this->status !== self::STATUS_PENDING) {
            throw new DomainException('Only pending leave can be approved.');
        }

        $this->status = self::STATUS_APPROVED;
    }

    public function reject(): void
    {
        if ($this->status !== self::STATUS_PENDING) {
            throw new DomainException('Only pending leave can be rejected.');
        }

        $this->status = self::STATUS_REJECTED;
    }

}