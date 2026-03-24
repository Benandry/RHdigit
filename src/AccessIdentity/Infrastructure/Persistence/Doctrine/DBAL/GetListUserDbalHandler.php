<?php

declare(strict_types=1);

namespace App\AccessIdentity\Infrastructure\Persistence\Doctrine\DBAL;

use App\AccessIdentity\Application\Query\GetListUser;
use App\AccessIdentity\Application\QueryHandler\GetListUserHandler;
use App\AccessIdentity\Application\ReadModel\GetListUserModel;
use App\AccessIdentity\Infrastructure\Persistence\Doctrine\DBAL\Query\UserQueryTrait;
use Doctrine\DBAL\Connection;

/**
 * Class GetListUserDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL
 */

final readonly class GetListUserDbalHandler implements GetListUserHandler
{
    use UserQueryTrait;
    public function __construct(
         private Connection $connection
    )
    {
    }
    public function __invoke(GetListUser $query): GetListUserModel
    {

        $data = $this->createBaseQuery()->executeQuery()->fetchAllAssociative();
        
        return new GetListUserModel(
            array_map(
                $this->mapDataToModel(...),
                $data
            )
        );
    }
}