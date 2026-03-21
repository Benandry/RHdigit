<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Poste;

use App\EmployeManagement\Application\Poste\Query\GetListPoste;
use App\EmployeManagement\Application\Poste\QueryHandler\GetListPosteHandler;
use App\EmployeManagement\Application\Poste\ReadModel\GetListPosteModel;
use App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Poste\Query\PosteQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetListPosteDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Departement
 */

final readonly class GetListPosteDbalHandler implements GetListPosteHandler
{
    use PosteQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetListPoste $query): GetListPosteModel
    {

        $data = $this->createBaseQuery()->executeQuery()->fetchAllAssociative();
        
        return new GetListPosteModel(
            array_map(
                $this->mapDataToGetPosteDetail(...),
                $data
            )
        );
    }
}