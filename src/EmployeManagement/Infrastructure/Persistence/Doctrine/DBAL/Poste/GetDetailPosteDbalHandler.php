<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Poste;

use App\EmployeManagement\Application\Poste\Query\GetDetailPoste;
use App\EmployeManagement\Application\Poste\QueryHandler\GetDetailPosteHandler;
use App\EmployeManagement\Application\Poste\ReadModel\GetDetailPosteModel;
use App\EmployeManagement\Domain\Exception\NotFoundException;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Poste\Query\PosteQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetDetailPosteDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetDetailPosteDbalHandler implements GetDetailPosteHandler
{
    use PosteQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetDetailPoste $query): GetDetailPosteModel
    {
       $queryBuilder = $this->createBaseQuery()
            ->where('p.id = :contratId')
            ->setParameter('contratId', $query->posteId);

        $data = $queryBuilder->executeQuery()->fetchAssociative();
        
        if (!$data) {
            throw NotFoundException::withId($query->posteId);
        }
        
        return $this->mapDataToGetPosteDetail($data);
    }
}