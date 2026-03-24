<?php

declare(strict_types=1);

namespace App\AccessIdentity\Infrastructure\Persistence\Doctrine\DBAL\Query;

use App\AccessIdentity\Application\ReadModel\GetDetailUserModel;
use App\EmployeManagement\Application\Contrat\ReadModel\GetDetailContratModel;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * trait UserQueryTrait
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Infrastructure\Persistence\Doctrine\DBAL\Query
 */
trait UserQueryTrait
{
    public function createBaseQuery(): QueryBuilder
    {
        return $this->connection->createQueryBuilder()
            ->select('u.id', 
            'u.username', 
            'u.first_name', 
            'u.last_name', 
            'u.email', 
            'u.is_active'
        )
        ->from('user', 'u');
    }
    
    public function mapDataToModel(array $data): GetDetailUserModel
    {
        return new GetDetailUserModel(
          id: $data['id'],
          username: $data['username'],
          firtName: $data['first_name'],
          lastName: $data['last_name'],
          email: $data['email'],
          status: $data['is_active'] === 1 ? true : false,
        );
    }
}
