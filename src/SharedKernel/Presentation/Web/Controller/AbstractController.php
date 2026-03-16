<?php

declare(strict_types=1);

namespace App\SharedKernel\Presentation\Web\Controller;

use App\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;

/**
 * Class AbstractController
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\SharedKernel\Presentation\Web\Controller
 */


abstract class AbstractController extends SymfonyController
{
    public static function getSubscribedServices(): array
    {
        $subscribedServices = parent::getSubscribedServices();

        $subscribedServices[] = CommandBus::class;

        return $subscribedServices;
    }

    protected function handleCommand(object $command): void
    {
        $this->container->get(CommandBus::class)->handle($command);
    }

    protected function handleQuery(object $command): mixed
    {
        return $this->container->get(CommandBus::class)->handle($command);
    }
}