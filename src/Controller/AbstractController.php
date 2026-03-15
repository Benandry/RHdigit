<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;

/**
 * Class AbstractController
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * 
 */


abstract class AbstractController extends SymfonyController
{
     public static function getSubscribedServices(): array
    {
        $subscribedServices = parent::getSubscribedServices();

        return $subscribedServices;
    }
}