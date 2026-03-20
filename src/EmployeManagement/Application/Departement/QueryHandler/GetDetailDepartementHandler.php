<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\QueryHandler;

use App\EmployeManagement\Application\Departement\Query\GetDetailDepartement;
use App\EmployeManagement\Application\Departement\ReadModel\GetDetailDepartementModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetDetailDepartementHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\QueryHandler
 */

interface GetDetailDepartementHandler extends QueryHandler
{
     public function __invoke(GetDetailDepartement $query): GetDetailDepartementModel;
}