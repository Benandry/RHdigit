<?php

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\Orm;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Domain\Model\Repository\ContratRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DomainException;

/**
 * @extends ServiceEntityRepository<Contrat>
 *
 * @method Contrat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contrat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contrat[]    findAll()
 * @method Contrat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratOrmRepository extends ServiceEntityRepository implements ContratRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contrat::class);
    }

    public function add(Contrat $contrat): void
    {
        $this->getEntityManager()->persist($contrat);
        $this->getEntityManager()->flush();
    }

    public function getById(int $id): Contrat
    {
        $contrat = $this->find($id);

        if($contrat === null)
        {
            throw new DomainException("Contrat not found with $id");
        }

        return $contrat;
    }

    public function remove(Contrat $contrat): void
    {
         $this->getEntityManager()->remove($contrat);
        $this->getEntityManager()->flush();
    }
}
