<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Poste;

use App\EmployeManagement\Application\Poste\Command\AddPoste;
use App\EmployeManagement\Presentation\Web\Form\PosteType;
use App\EmployeManagement\Presentation\Web\WriteModel\PosteModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/poste/new', name: 'app_poste.create', methods: ['POST', 'GET'])]
class CreatePosteController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $posteModel = new PosteModel();
        $form = $this->createForm(PosteType::class, $posteModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new AddPoste(
                $posteModel->name,
                $posteModel->description,
                $posteModel->departement
            ));

            $this->addFlash('success', 'Poste créé avec success');

            return $this->redirectToRoute('app_poste.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('poste/new.html.twig', [
            'poste' => $posteModel,
            'form' => $form,
        ]);
    }
}
