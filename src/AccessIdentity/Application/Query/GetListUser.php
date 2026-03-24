<?php

declare(strict_types=1);

namespace App\AccessIdentity\Application\Query;

/**
 * Class GetListUser
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Application\Query
 */

final readonly class GetListUser
{
    public function __construct(public array $requestQueries = [])
    {
    }
}