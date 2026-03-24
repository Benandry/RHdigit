<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\ReadModel;

/**
 * Class GetDetailUserModel
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package  App\AccessIdentity\Application\ReadModel
 */

final readonly class GetDetailUserModel
{
    public function __construct(
        public int $id,
        public string $username,
        public string $firtName,
        public string $lastName,
        public string $email,
        public bool $status,
    )
    {
    }
}