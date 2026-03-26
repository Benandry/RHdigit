<?php

declare(strict_types=1);

namespace App\AccessIdentity\Presentation\Web\Controller;

use App\AccessIdentity\Application\Command\UpdateProfilCommand;
use App\AccessIdentity\Domain\Model\Entity\User;
use App\AccessIdentity\Presentation\Web\Form\UpdateProfileFormType;
use App\AccessIdentity\Presentation\Web\WriteModel\UserModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Class UpdateProfileController
 * 
 * @author Eloi Charly <nandry556@gmaim.com>
 * @package App\AccessIdentity\Presentation\Web\Controller
 */

#[IsGranted('ROLE_USER')]
#[Route(path: '/admin/user/update-profile', name: 'app_user.update_profile', methods: ['GET', 'POST'])]
final class UpdateProfileController extends AbstractController
{
    public function __invoke(Request $request, #[CurrentUser] User $user): Response
    {
        $userModel = UserModel::createFromUser($user);
        $form = $this->createForm(UpdateProfileFormType::class, $userModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new UpdateProfilCommand(
                userId: $user->getId(),
                username: $userModel->username,
                email: $userModel->email,
                firstName: $userModel->firstName,
                lastName: $userModel->lastName,
            ));
            
            return $this->redirectToRoute('app_home');
        }

        return $this->render('user/update_profile.html.twig',[
            'user_profile' => $user,
            'form_profile' => $form->createView(),
        ]);
    }
}