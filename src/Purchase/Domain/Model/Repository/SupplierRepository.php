<?php

declare(strict_types=1);

namespace App\Purchase\Domain\Model\Repository;

use App\Purchase\Domain\Model\Entity\Supplier;

interface SupplierRepository
{
    public function save(Supplier $supplier): void;
    public function findAll(): array;
    public function getById(int $id): Supplier;
    public function delete(Supplier $supplier): void;
}