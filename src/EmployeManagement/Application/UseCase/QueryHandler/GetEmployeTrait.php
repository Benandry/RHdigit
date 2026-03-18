<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\UseCase\QueryHandler;

use App\EmployeManagement\Application\ReadModel\GetDetailEmployeModel;
use Doctrine\DBAL\Query\QueryBuilder;
/**
 * Trait GetEmployeTrait
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\QueryHandler
 */
trait GetEmployeTrait
{
    public function createBaseQuery(): QueryBuilder
    {
        return $this->connection->createQueryBuilder()
            ->select('e.id', 
            'e.firstname as firstname', 
            'e.lastname as lastname',
            'e.cin as cin',
            'e.adresse as adresse', 
            'e.phone_number as phone_number', 
            'e.salary as salary', 
            'e.date_of_birth as date_of_birth',
            'e.image_name as image_name', 
            'e.updated_at as updated_at'
        )
        ->addSelect(
            'p.id as poste_id',
            'p.name as poste_name',
            'c.id as contrat_id',
            'c.name as contrat_name',
            'd.name as departement_name'
        )
        ->from('employee', 'e')
        ->leftJoin('e', 'poste', 'p', 'e.poste_id = p.id')
        ->leftJoin('p', 'departement', 'd', 'p.departement_id = d.id')
        ->leftJoin('e', 'contrat', 'c', 'e.contrat_id = c.id');;
    }
    
    public function mapDataToGetEmployeeDetail(array $data): GetDetailEmployeModel
    {
        return new GetDetailEmployeModel(
            id: $data['id'],
            firstname: $data['firstname'],
            lastname: $data['lastname'],
            cin: $data['cin'],
            adresse: $data['adresse'],
            phoneNumber: $data['phone_number'],
            salary: $data['salary'],
            dateOfBirth: isset($data['date_of_birth']) ? new \DateTimeImmutable($data['date_of_birth']) : null,
            imageName: $data['image_name'] ?? null,
            updatedAt: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            posteId: $data['poste_id'],
            contratId: $data['contrat_id'],
            posteName: $data['poste_name'],
            contratName: $data['contrat_name'],
            departementName: $data['departement_name']
        );
    }
}
