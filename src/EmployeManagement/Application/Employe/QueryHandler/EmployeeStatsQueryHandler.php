<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\QueryHandler;

use App\EmployeManagement\Application\Employe\Query\EmployeeStatsQuery;
use App\SharedKernel\Application\Query\QueryHandler;
/**
 * Class EmployeeStatsQueryHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\QueryHandler
 */

interface  EmployeeStatsQueryHandler extends QueryHandler
{
     public function __invoke(EmployeeStatsQuery $query): array;
}