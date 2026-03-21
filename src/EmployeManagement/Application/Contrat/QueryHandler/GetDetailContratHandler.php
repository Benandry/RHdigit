<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Contrat\QueryHandler;

use App\EmployeManagement\Application\Contrat\Query\GetDetailContrat;
use App\EmployeManagement\Application\Contrat\ReadModel\GetDetailContratModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetDetailContratHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Contrat\QueryHandler
 */

interface GetDetailContratHandler extends QueryHandler
{
     public function __invoke(GetDetailContrat $query): GetDetailContratModel;
}