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
            ->select('c.id', 
            'c.name', 
            'c.description'
        )
        ->from('contrat', 'c');
    }
    
    public function mapDataToGetContratDetail(array $data): GetDetailContratModel
    {
        return new GetDetailContratModel(
            id: $data['id'],
            name: $data['name'],
            description: $data['description']
        );
    }
}
