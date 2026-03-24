<?php 

declare(strict_types=1);

namespace App\Purchase\Infrastructure\Persistence\Orm;

use App\Purchase\Domain\Model\Entity\Supplier;
use App\Purchase\Domain\Model\Repository\SupplierRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * 
 * Class SupplierOrmRepository
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\Purchase\Infrastructure\Persistence\Orm
 */

final class SupplierOrmRepository extends ServiceEntityRepository implements SupplierRepository
{
     public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Supplier::class);
    }

    public function save(Supplier $supplier): void
    {
        $this->getEntityManager()->persist($supplier);
        $this->getEntityManager()->flush();
    }

    public function findAll(): array
    {
        return $this->findBy([], ['name' => 'ASC']);
    }

    public function getById(int $id): Supplier
    {
        $supplier = $this->find($id);
        if (!$supplier) {
            throw new \RuntimeException("Supplier with id $id not found.");
        }
        return $supplier;
    }

    public function delete(Supplier $supplier): void
    {
        $this->getEntityManager()->remove($supplier);
        $this->getEntityManager()->flush();
    }
}