<?php

declare(strict_types=1);

namespace App\AccessIdentity\Presentation\Web\Controller;

use App\AccessIdentity\Application\Command\RegistrationCommand;
use App\AccessIdentity\Domain\Model\Entity\User;
use App\AccessIdentity\Presentation\Web\Form\RegistrationFormType;
use App\AccessIdentity\Presentation\Web\WriteModel\UserModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Class GetListUserProfileController
 * 
 * @author Eloi Charly <nandry556@gmaim.com>
 * @package App\AccessIdentity\Presentation\Web\Controller
 */

#[IsGranted('ROLE_USER')]
#[Route(path: '/admin/user/profile', name: 'app_user.profile', methods: ['GET'])]
final class GetUserProfileController extends AbstractController
{
    public function __invoke(Request $request, #[CurrentUser] User $user): Response
    {
        $userModel = new UserModel();
        $form = $this->createForm(RegistrationFormType::class, $userModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $this->handleCommand(new RegistrationCommand(
                $userModel->username,
                $userModel->email,
                $userModel->firstName,
                $userModel->lastName,
                $plainPassword,
            ));
            
            return $this->redirectToRoute('app_home');
        }

        return $this->render('user/detail.html.twig',[
            'user_profile' => $user,
            'form_profile' => $form->createView(),
        ]);
    }
}