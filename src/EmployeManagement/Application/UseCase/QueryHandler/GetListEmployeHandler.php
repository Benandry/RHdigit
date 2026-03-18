<?php

namespace App\EmployeManagement\Application\UseCase\QueryHandler;

use App\EmployeManagement\Application\ReadModel\GetListEmployeModel;
use App\EmployeManagement\Application\UseCase\Query\GetListEmploye;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class GetListEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\QueryHandler
 */

#[AsMessageHandler('query.bus')]
final readonly class GetListEmployeHandler 
{
    use GetEmployeTrait;
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