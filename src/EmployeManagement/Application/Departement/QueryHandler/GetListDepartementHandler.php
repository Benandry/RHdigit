<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Departement\QueryHandler;

use App\EmployeManagement\Application\Departement\Query\GetListDepartement;
use App\EmployeManagement\Application\Departement\ReadModel\GetListDepartementModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetListDepartementHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Departement\QueryHandler
 */

interface GetListDepartementHandler extends QueryHandler
{
     public function __invoke(GetListDepartement $query): GetListDepartementModel;
}