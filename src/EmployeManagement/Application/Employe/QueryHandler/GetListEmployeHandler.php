<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\QueryHandler;

use App\EmployeManagement\Application\Employe\Query\GetListEmploye;
use App\EmployeManagement\Application\Employe\ReadModel\GetListEmployeModel;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class GetListEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\QueryHandler
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