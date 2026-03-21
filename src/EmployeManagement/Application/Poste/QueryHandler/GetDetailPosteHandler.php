<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\QueryHandler;

use App\EmployeManagement\Application\Poste\Query\GetDetailPoste;
use App\EmployeManagement\Application\Poste\ReadModel\GetDetailPosteModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetDetailPosteHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\QueryHandler
 */

interface GetDetailPosteHandler extends QueryHandler
{
     public function __invoke(GetDetailPoste $query): GetDetailPosteModel;
}