<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Poste\Query;

use App\EmployeManagement\Application\Poste\ReadModel\GetDetailPosteModel;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * trait PosteQueryTrait
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat\Query
 */
trait PosteQueryTrait
{
    public function createBaseQuery(): QueryBuilder
    {
        return $this->connection->createQueryBuilder()
            ->select('p.id', 
            'p.name', 
            'p.description',
            'd.name as departement_name'
        )
        ->leftJoin('p', 'departement', 'd', 'p.departement_id = d.id')
        ->from('poste', 'p');
    }
    
    public function mapDataToGetPosteDetail(array $data): GetDetailPosteModel
    {
        return new GetDetailPosteModel(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            departement: $data['departement_name']
        );
    }
}
