<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Application\Contrat\Command\UpdateContrat;
use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\EmployeManagement\Presentation\Web\Form\ContratType;
use App\EmployeManagement\Presentation\Web\WriteModel\ContratModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/{id}/edit', name: 'app_contrat.edit', methods: ['POST', 'GET'])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class UpdateContratController extends AbstractController
{
    public function __invoke(Request $request, Contrat $contrat): Response
    {
        $contratModel = ContratModel::createModelFromEntity($contrat);
        $form = $this->createForm(ContratType::class, $contratModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->handleCommand(new UpdateContrat(
                $contrat->id,
                $contratModel->name,
                $contratModel->description
           ));

            return $this->redirectToRoute('app_contrat.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat/edit.html.twig', [
            'contrat' => $contrat,
            'form' => $form,
        ]);
    }
}
