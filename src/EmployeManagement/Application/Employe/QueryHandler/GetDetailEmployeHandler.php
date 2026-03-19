<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\QueryHandler;

use App\EmployeManagement\Application\Employe\Query\GetDetailEmploye;
use App\EmployeManagement\Application\Employe\ReadModel\GetDetailEmployeModel;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class GetDetailEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\QueryHandler
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