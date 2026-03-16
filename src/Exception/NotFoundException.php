<?php

declare(strict_types=1);

namespace App\Exception;

use DomainException;

/**
 * Class NotFoundException 
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 */


final class NotFoundException extends DomainException
{
    public static function withId(int $id): static
    {
        return new self(\sprintf("Entity not found with id %d",$id));
    }
}