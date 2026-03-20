<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement;

use App\EmployeManagement\Application\Departement\Query\GetListDepartement;
use App\EmployeManagement\Application\Departement\QueryHandler\GetListDepartementHandler;
use App\EmployeManagement\Application\Departement\ReadModel\GetListDepartementModel;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement\Query\DepartementQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetListDepartementDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetListDepartementDbalHandler implements GetListDepartementHandler
{
    use DepartementQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetListDepartement $query): GetListDepartementModel
    {

        $data = $this->createBaseQuery()->executeQuery()->fetchAllAssociative();
        
        return new GetListDepartementModel(
            array_map(
                $this->mapDataToGetDepartmentDetail(...),
                $data
            )
        );
    }
}