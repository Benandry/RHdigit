<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat\Query;

use App\EmployeManagement\Application\Contrat\ReadModel\GetDetailContratModel;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * trait ContratQueryTrait
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat\Query
 */
trait ContratQueryTrait
{
    public function createBaseQuery(): QueryBuilder
    {
        return $this->connection->createQueryBuilder()
            ->select('d.id', 
            'd.name', 
            'd.description'
        )
        ->from('contrat', 'd');
    }
    
    public function mapDataToGetDepartmentDetail(array $data): GetDetailContratModel
    {
        return new GetDetailContratModel(
            id: $data['id'],
            name: $data['name'],
            description: $data['description']
        );
    }
}
