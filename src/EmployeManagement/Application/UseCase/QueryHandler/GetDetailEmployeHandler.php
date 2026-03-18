<?php

namespace App\EmployeManagement\Application\UseCase\QueryHandler;

use App\EmployeManagement\Application\ReadModel\GetDetailEmployeModel;
use App\EmployeManagement\Application\UseCase\Query\GetDetailEmploye;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class GetDetailEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\QueryHandler
 */

#[AsMessageHandler('query.bus')]
final readonly class GetDetailEmployeHandler
{
    use GetEmployeTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetDetailEmploye $query): GetDetailEmployeModel
    {
       $queryBuilder = $this->createBaseQuery()
            ->where('e.id = :id')
            ->setParameter('id', $query->employeId);

        $data = $queryBuilder->executeQuery()->fetchAssociative();
        
        if (!$data) {
            throw NotFoundException::withId($query->employeId);
        }
        
        return $this->mapDataToGetEmployeeDetail($data);
    }
}