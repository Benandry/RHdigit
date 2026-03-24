<?php

namespace App\AccessIdentity\Presentation\Web\Controller;

use App\AccessIdentity\Application\Command\RegistrationCommand;
use App\AccessIdentity\Presentation\Web\Form\RegistrationFormType;
use App\AccessIdentity\Presentation\Web\WriteModel\UserModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/register', name: 'app_register')]
final class RegistrationController extends AbstractController
{
    public function __invoke(Request $request): Response
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

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
