<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\QueryHandler;

use App\EmployeManagement\Application\Contrat\Query\GetListContrat;
use App\EmployeManagement\Application\Contrat\ReadModel\GetListContratModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetListContratHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\QueryHandler
 */

interface GetListContratHandler extends QueryHandler
{
     public function __invoke(GetListContrat $query): GetListContratModel;
}