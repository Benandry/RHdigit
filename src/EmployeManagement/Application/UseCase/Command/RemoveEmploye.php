<?php

namespace App\EmployeManagement\Application\UseCase\Command;

/**
 * Class RemoveEmploye
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Application\UseCase\Command
 */
final readonly class RemoveEmploye
{
    /*
     * Add whatever properties and methods you need
     * to hold the data for this message class.
     */

    public function __construct(
        public int $employeId
    ) {
    }
}
