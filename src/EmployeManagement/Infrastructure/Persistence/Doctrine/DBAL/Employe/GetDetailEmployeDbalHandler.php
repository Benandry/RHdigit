<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe;

use App\EmployeManagement\Application\Employe\Query\GetDetailEmploye;
use App\EmployeManagement\Application\Employe\QueryHandler\GetDetailEmployeHandler;
use App\EmployeManagement\Application\Employe\ReadModel\GetDetailEmployeModel;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe\Feature\EmployeQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetDetailEmployeDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe
 */

final readonly class GetDetailEmployeDbalHandler implements GetDetailEmployeHandler
{
    use EmployeQueryTrait;
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