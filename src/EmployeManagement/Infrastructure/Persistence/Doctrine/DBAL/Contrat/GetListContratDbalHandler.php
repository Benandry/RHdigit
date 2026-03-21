<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat;

use App\EmployeManagement\Application\Contrat\Query\GetListContrat;
use App\EmployeManagement\Application\Contrat\QueryHandler\GetListContratHandler;
use App\EmployeManagement\Application\Contrat\ReadModel\GetListContratModel;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Contrat\Query\ContratQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetListContratDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetListContratDbalHandler implements GetListContratHandler
{
    use ContratQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetListContrat $query): GetListContratModel
    {

        $data = $this->createBaseQuery()->executeQuery()->fetchAllAssociative();
        
        return new GetListContratModel(
            array_map(
                $this->mapDataToGetDepartmentDetail(...),
                $data
            )
        );
    }
}