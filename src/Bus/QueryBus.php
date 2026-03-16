<?php

namespace App\Bus;

use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class queryBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 */

final class QueryBus
{
    use HandleTrait {
        handle as messengerHandle;
    }

    public function __construct(
        MessageBusInterface $queryBus
    )
    {
        $this->messageBus = $queryBus;
    }

    public function handle(object $message, array $stamps = []): mixed
    {
        try {
            return $this->messengerHandle($message);
        } catch (HandlerFailedException $th) {
            while($th instanceof HandlerFailedException)
            {
                $th = $th->getPrevious();   
            }

            throw $th;
        }
    }

    public function dispatch(object $message)
    {
        $this->messageBus->dispatch($message);
    }
}