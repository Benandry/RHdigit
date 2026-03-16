<?php

namespace App\EmployeManagement\Infrastructure\Doctrine;

use App\EmployeManagement\Domain\Exception\NotFoundException;
use App\EmployeManagement\Domain\Model\Repository\EmployeRepository;
use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @extends ServiceEntityRepository<Employee>
 *
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeOrmRepository extends ServiceEntityRepository implements EmployeRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function add(Employee $employee): void 
    {
        $this->getEntityManager()->persist($employee);
        $this->getEntityManager()->flush();
    }
    
    public function getById(int $id): Employee
    {
        $employe = $this->find($id);

        if(null === $employe)
        {
            throw NotFoundException::withId($id);
        }

        return $employe;
    }

    public function remove(Employee $employee): void 
    {
        $this->getEntityManager()->remove($employee);
        $this->getEntityManager()->flush();
    }
}
