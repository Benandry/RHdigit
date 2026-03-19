<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\QueryHandler;

use App\EmployeManagement\Application\Employe\Query\GetListEmploye;
use App\EmployeManagement\Application\Employe\ReadModel\GetListEmployeModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * Interface GetListEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\QueryHandler
 */

interface GetListEmployeHandler extends QueryHandler
{
    public function __invoke(GetListEmploye $query): GetListEmployeModel;
}