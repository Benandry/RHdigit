<?php

namespace App\SharedKernel\Application\Bus;

/**
 * Interface CommandBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\SharedKernel\Application\Bus
 */

interface CommandBus
{
    public function handle(object $command, array $stamps = []): mixed;
}