<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Application\Contrat\Command\AddContrat;
use App\EmployeManagement\Presentation\Web\Form\ContratType;
use App\EmployeManagement\Presentation\Web\WriteModel\ContratModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/new', name: 'app_contrat.create', methods: ['POST', 'GET'])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class CreateContratController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $contratModel = new ContratModel();
        $form = $this->createForm(ContratType::class, $contratModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $this->handleCommand(new AddContrat(
                $contratModel->name,
                $contratModel->description
           ));

           $this->addFlash('success', 'Contrat créé avec success');

            return $this->redirectToRoute('app_contrat.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat/new.html.twig', [
            'contrat' => $contratModel,
            'form' => $form,
        ]);
    }
}
