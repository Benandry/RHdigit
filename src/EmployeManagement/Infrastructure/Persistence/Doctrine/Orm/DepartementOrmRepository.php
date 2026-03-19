<?php

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\Orm;

use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\EmployeManagement\Domain\Model\Repository\DepartementRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Departement>
 *
 * @method Departement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Departement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Departement[]    findAll()
 * @method Departement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartementOrmRepository extends ServiceEntityRepository implements DepartementRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Departement::class);
    }

    public function add(Departement $departement): void
    {
        $this->getEntityManager()->persist($departement);
        $this->getEntityManager()->flush();
    }

    public function getById(int $id): Departement
    {
        $departement = $this->find($id);

        if (!$departement) {
            throw new \RuntimeException(sprintf('Departement with id %d not found', $id));
        }

        return $departement;
    }

    public function remove(Departement $departement): void
    {
        $this->getEntityManager()->remove($departement);
        $this->getEntityManager()->flush();
    }
}
