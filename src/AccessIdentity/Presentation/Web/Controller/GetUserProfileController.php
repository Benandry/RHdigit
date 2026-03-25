<?php

declare(strict_types=1);

namespace App\AccessIdentity\Presentation\Web\Controller;

use App\AccessIdentity\Domain\Model\Entity\User;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Class GetUserProfileController
 * 
 * @author Eloi Charly <nandry556@gmaim.com>
 * @package App\AccessIdentity\Presentation\Web\Controller
 */

#[IsGranted('ROLE_USER')]
#[Route(path: '/admin/user/profile', name: 'app_user.profile', methods: ['GET'])]
final class GetUserProfileController extends AbstractController
{
    public function __invoke(#[CurrentUser] User $user): Response
    {
        return $this->render('user/detail.html.twig',[
            'user_profile' => $user,
        ]);
    }
}