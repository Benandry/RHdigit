<?php

namespace App\SharedKernel\Infrastructure\Bus;

use App\SharedKernel\Application\Bus\CommandBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class MessengerCommandBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\SharedKernel\Infrastructure\Bus;
 */

final class MessengerCommandBus implements CommandBus
{
    use HandleTrait {
        handle as messengerHandle;
    }

    public function __construct(
        MessageBusInterface $commandBus
    )
    {
        $this->messageBus = $commandBus;
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
