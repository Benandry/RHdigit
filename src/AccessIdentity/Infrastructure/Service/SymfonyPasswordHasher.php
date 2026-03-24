<?php 

declare(strict_types=1);

namespace App\AccessIdentity\Infrastructure\Security;

use App\AccessIdentity\Application\Service\PasswordHasherInterface;
use App\AccessIdentity\Domain\Model\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;


/**
 * Class SymfonyPasswordHasher
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\AccessIdentity\Infrastructure\Security
 */

final class SymfonyPasswordHasher implements PasswordHasherInterface
{
    public function __construct(
        private PasswordHasherFactoryInterface $userPasswordHasher
    ) {}

    public function hashPassword(string $plainPassword): string
    {
        // On récupère le hasher par défaut de Symfony
        $hasher = $this->userPasswordHasher->getPasswordHasher('common'); 
        return $hasher->hash($plainPassword);
    }
}