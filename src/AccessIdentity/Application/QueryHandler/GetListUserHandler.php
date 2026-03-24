<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\QueryHandler;

use App\AccessIdentity\Application\Query\GetListUser;
use App\AccessIdentity\Application\ReadModel\GetListUserModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetListUserHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\QueryHandler
 */

interface  GetListUserHandler extends QueryHandler
{
    public function __invoke(GetListUser $query): GetListUserModel ;
}