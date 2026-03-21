<?php

declare(strict_types=1);

namespace App\EmployeManagement\Application\Poste\QueryHandler;

use App\EmployeManagement\Application\Poste\Query\GetListPoste;
use App\EmployeManagement\Application\Poste\ReadModel\GetListPosteModel;
use App\SharedKernel\Application\Query\QueryHandler;

/**
 * interface GetListPosteHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\Poste\QueryHandler
 */

interface GetListPosteHandler extends QueryHandler
{
     public function __invoke(GetListPoste $query): GetListPosteModel
     ;
}