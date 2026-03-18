<?php

namespace App\SharedKernel\Infrastructure\Bus;

use App\SharedKernel\Application\Bus\MessageBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class MessengerMessageBus
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\SharedKernel\Infrastructure\Bus;
 */

final class MessengerMessageBus implements MessageBus
{
    use HandleTrait {
        handle as messengerHandle;
    }

    public function __construct(
        MessageBusInterface $messageBus
    )
    {
        $this->messageBus = $messageBus;
    }


    public function dispatch(object $message): void
    {
        $this->messageBus->dispatch($message);
    }
}
