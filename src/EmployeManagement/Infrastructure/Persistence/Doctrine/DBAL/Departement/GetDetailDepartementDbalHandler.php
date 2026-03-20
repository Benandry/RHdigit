<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement;

use App\EmployeManagement\Application\Departement\Query\GetDetailDepartement;
use App\EmployeManagement\Application\Departement\QueryHandler\GetDetailDepartementHandler;
use App\EmployeManagement\Application\Departement\ReadModel\GetDetailDepartementModel;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement\Query\DepartementQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetDetailDepartementDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetDetailDepartementDbalHandler implements GetDetailDepartementHandler
{
    use DepartementQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetDetailDepartement $query): GetDetailDepartementModel
    {
       $queryBuilder = $this->createBaseQuery()
            ->where('d.id = :departementId')
            ->setParameter('departementId', $query->departementId);

        $data = $queryBuilder->executeQuery()->fetchAssociative();
        
        if (!$data) {
            throw NotFoundException::withId($query->departementId);
        }
        
        return $this->mapDataToGetDepartmentDetail($data);
    }
}