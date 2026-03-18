<?php

namespace App\SharedKernel\Application\Bus;

/**
 * Interface QueryBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package  App\SharedKernel\Application\Bus
 */

interface MessageBus
{
      public function dispatch(object $message) : void;
}