<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\ReadModel;

use DomainException;

/**
 * Class GetListUserModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package  App\AccessIdentity\Application\ReadModel
 */

final readonly class GetListUserModel
{
    public function __construct(public array $userItems)
    {
        foreach ($this->userItems as $value) {
          if (!$value instanceof GetDetailUserModel ) {
              throw new DomainException('Item not valid');
          }
        }
    }
}