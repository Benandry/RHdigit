<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe;

use App\EmployeManagement\Application\Employe\Query\GetListEmploye;
use App\EmployeManagement\Application\Employe\QueryHandler\GetListEmployeHandler;
use App\EmployeManagement\Application\Employe\ReadModel\GetListEmployeModel;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe\Feature\EmployeQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetListEmployeDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe
 */

final readonly class GetListEmployeDbalHandler implements GetListEmployeHandler
{
    use EmployeQueryTrait;
    public function __construct(
        private Connection $connection
    )
    {
    }
    public function __invoke(GetListEmploye $query): GetListEmployeModel
    {
        $queryBuilder = $this->createBaseQuery();

        $data = $queryBuilder->executeQuery()->fetchAllAssociative();

        return new GetListEmployeModel(
            array_map(
                $this->mapDataToGetEmployeeDetail(...), $data
            )
        );
    }
}