<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement\Query;

use App\EmployeManagement\Application\Departement\ReadModel\GetDetailDepartementModel;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * trait DepartementQueryTrait
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement\Query
 */
trait DepartementQueryTrait
{
    public function createBaseQuery(): QueryBuilder
    {
        return $this->connection->createQueryBuilder()
            ->select('d.id', 
            'd.name', 
            'd.description',
            'd.created_at',
            'd.updated_at',
        )
        ->from('departement', 'd');
    }
    
    public function mapDataToGetDepartmentDetail(array $data): GetDetailDepartementModel
    {
        return new GetDetailDepartementModel(
            departementId: $data['id'],
            name: $data['name'],
            description: $data['description'],
            createdAt: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            updatedAt: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null
        );
    }
}
