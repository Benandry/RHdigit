<?php

namespace App\SharedKernel\Application\Query;

/**
 * Interface QueryBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package  App\SharedKernel\Application\Bus
 */

interface QueryBus
{
    public function handle(object $message, array $stamps = []): mixed;
}