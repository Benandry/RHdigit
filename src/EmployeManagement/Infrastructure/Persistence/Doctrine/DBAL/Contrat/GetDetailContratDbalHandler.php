<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement;

use App\EmployeManagement\Application\Contrat\Query\GetDetailContrat;
use App\EmployeManagement\Application\Contrat\QueryHandler\GetDetailContratHandler;
use App\EmployeManagement\Application\Contrat\ReadModel\GetDetailContratModel;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat\Query\ContratQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetDetailContratDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetDetailContratDbalHandler implements GetDetailContratHandler
{
    use ContratQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetDetailContrat $query): GetDetailContratModel
    {
       $queryBuilder = $this->createBaseQuery()
            ->where('c.id = :contratId')
            ->setParameter('contratId', $query->contratId);

        $data = $queryBuilder->executeQuery()->fetchAssociative();
        
        if (!$data) {
            throw NotFoundException::withId($query->contratId);
        }
        
        return $this->mapDataToGetContratDetail($data);
    }
}