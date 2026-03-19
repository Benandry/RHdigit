<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Employe\QueryHandler;

use App\EmployeManagement\Application\Employe\Query\GetDetailEmploye;
use App\EmployeManagement\Application\Employe\ReadModel\GetDetailEmployeModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * Interface GetDetailEmployeHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Employe\QueryHandler
 */

interface GetDetailEmployeHandler extends QueryHandler
{
    public function __invoke(GetDetailEmploye $query): GetDetailEmployeModel;
}