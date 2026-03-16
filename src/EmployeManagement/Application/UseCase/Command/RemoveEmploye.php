<?php

namespace App\EmployeManagement\Application\UseCase\Command;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('sync')]
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
