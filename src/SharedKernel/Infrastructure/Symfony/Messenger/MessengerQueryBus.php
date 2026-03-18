<?php

namespace App\SharedKernel\Infrastructure\Symfony\Messenger;

use App\SharedKernel\Application\Query\QueryBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class MessengerQueryBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\SharedKernel\Infrastructure\Bus;
 */

final class MessengerQueryBus implements QueryBus
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
}
