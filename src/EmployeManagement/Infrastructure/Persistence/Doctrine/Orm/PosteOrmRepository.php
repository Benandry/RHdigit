<?php

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\Orm;

use App\EmployeManagement\Domain\Model\Entity\Poste;
use App\EmployeManagement\Domain\Model\Repository\PosteRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DomainException;

/**
 * @extends ServiceEntityRepository<Poste>
 *
 * @method Poste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poste[]    findAll()
 * @method Poste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PosteOrmRepository extends ServiceEntityRepository implements PosteRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poste::class);
    }

    public function add(Poste $poste): void
    {
        $this->getEntityManager()->persist($poste);
        $this->getEntityManager()->flush();
    }

    public function getById(int $id): Poste
    {
        $poste = $this->find($id);

        if($poste === null)
        {
            throw new DomainException("Poste not Found with $id ");
        }

        return $poste;
    }

    public function remove(Poste $poste): void
    {
        $this->getEntityManager()->remove($poste);
        $this->getEntityManager()->flush();
    }
}
